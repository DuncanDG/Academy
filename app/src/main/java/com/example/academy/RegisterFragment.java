package com.example.academy;

import static android.content.ContentValues.TAG;

import android.app.Activity;
import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.Intent;
import android.nfc.Tag;
import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;

import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;

import java.util.concurrent.Executor;

import dmax.dialog.SpotsDialog;

/**
 * A simple {@link Fragment} subclass.
 * Use the {@link RegisterFragment#newInstance} factory method to
 * create an instance of this fragment.
 */
public class RegisterFragment extends Fragment {

    // TODO: Rename parameter arguments, choose names that match
    // the fragment initialization parameters, e.g. ARG_ITEM_NUMBER
    private static final String ARG_PARAM1 = "param1";
    private static final String ARG_PARAM2 = "param2";

    // TODO: Rename and change types of parameters
    private String mParam1;
    private String mParam2;

    //Declare an instance of FirebaseAuth
    private FirebaseAuth mAuth;
    private EditText name;
    private EditText email;
    private EditText phone;
    private EditText password;
    private EditText re_password;
    private AlertDialog progressDialog;

    public RegisterFragment() {
        // Required empty public constructor
    }

    /**
     * Use this factory method to create a new instance of
     * this fragment using the provided parameters.
     *
     * @param param1 Parameter 1.
     * @param param2 Parameter 2.
     * @return A new instance of fragment RegisterFragment.
     */
    // TODO: Rename and change types and number of parameters
    public static RegisterFragment newInstance(String param1, String param2) {
        RegisterFragment fragment = new RegisterFragment();
        Bundle args = new Bundle();
        args.putString(ARG_PARAM1, param1);
        args.putString(ARG_PARAM2, param2);
        fragment.setArguments(args);
        return fragment;
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        //initialize the FirebaseAuth instance
        mAuth = FirebaseAuth.getInstance();

        if (getArguments() != null) {
            mParam1 = getArguments().getString(ARG_PARAM1);
            mParam2 = getArguments().getString(ARG_PARAM2);
        }
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment and put it in a variable called view
        //inflating is like creating an instance
        View view = inflater.inflate(R.layout.fragment_register, container, false);



         name = (EditText) view.findViewById(R.id.et_name);
         email = (EditText) view.findViewById(R.id.et_email);
         phone = (EditText) view.findViewById(R.id.et_phone);
         password = (EditText) view.findViewById(R.id.et_password);
         re_password = (EditText) view.findViewById(R.id.et_re_type_password);
        Button register = (Button) view.findViewById(R.id.btn_register);

        register.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                registerUser();
            }
        });
        return view;
    }

    private <task> void registerUser(){
       //input from the user comes as a text should be converted to string
        //these new variables created are strings
//        String rname = name.getText().toString().trim();
        String remail = (String) email.getText().toString().trim();
//        String rphone = phone.getText().toString().trim();
        String rpassword = (String) password.getText().toString().trim();
        String rre_password = (String) re_password.getText().toString().trim();

        //confrim / validate user details
        if (remail.isEmpty()){
              email.setError("Please Enter Your Email");
        }else if(rpassword.isEmpty()){
             password.setError("Please Enter Your Password");
        }else if (rre_password.isEmpty()){
             re_password.setError("Please Confirm Password");
        }else if (rpassword.length()<=6){
             password.setError("Please Enter a Password Greater Than or Equal to 6 Digits");
        }else if (!rpassword.equals(rre_password)){
             re_password.setError("Passwords Don't Match");
        }else{

            mAuth.createUserWithEmailAndPassword(remail, rpassword)
                    .addOnCompleteListener((Activity) getContext(), new OnCompleteListener<AuthResult>() {
                        @Override
                        public void onComplete(@NonNull Task<AuthResult> task) {

                            progressDialog = new SpotsDialog(getContext(), R.style.Custom);
//                            progressDialog.setMessage("Registering. Please wait.");
                            progressDialog.show();


                            if (!task.isSuccessful()) {
                                Toast.makeText(getContext(), "Authentication failed." + task.getException(),
                                        Toast.LENGTH_SHORT).show();
                            } else {
                                // Sign in success, update UI with the signed-in user's information
                                //log.d it is a method used to log debug messages
                                Log.d(TAG, "createUserWithEmail:success");
                                FirebaseUser user = mAuth.getCurrentUser();
                                startActivity(new Intent(getContext(), MainActivity.class));
                                ((Activity) getContext()).finish();
                            }
                        }
                    });
        }
    }
}