    package com.example.academy;

import android.app.Activity;
import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;

import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;
import com.google.firebase.auth.AuthResult;
import com.google.firebase.auth.FirebaseAuth;

import dmax.dialog.SpotsDialog;

    /**
 * A simple {@link Fragment} subclass.
 * Use the {@link LoginFragment#newInstance} factory method to
 * create an instance of this fragment.
 */
public class LoginFragment extends Fragment {

    private FirebaseAuth mAuth;
    private EditText email;
    private EditText password;
    private AlertDialog progressDialog;

    // TODO: Rename parameter arguments, choose names that match
    // the fragment initialization parameters, e.g. ARG_ITEM_NUMBER
    private static final String ARG_PARAM1 = "param1";
    private static final String ARG_PARAM2 = "param2";

    // TODO: Rename and change types of parameters
    private String mParam1;
    private String mParam2;


        public LoginFragment() {
        // Required empty public constructor
    }

    /**
     * Use this factory method to create a new instance of
     * this fragment using the provided parameters.
     *
     * @param param1 Parameter 1.
     * @param param2 Parameter 2.
     * @return A new instance of fragment LoginFragment.
     */
    // TODO: Rename and change types and number of parameters
    public static LoginFragment newInstance(String param1, String param2) {
        LoginFragment fragment = new LoginFragment();
        Bundle args = new Bundle();
        args.putString(ARG_PARAM1, param1);
        args.putString(ARG_PARAM2, param2);
        fragment.setArguments(args);
        return fragment;
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        if (getArguments() != null) {
            mParam1 = getArguments().getString(ARG_PARAM1);
            mParam2 = getArguments().getString(ARG_PARAM2);
        }
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_login, container, false);

        //create an instance of FirebaseAuth
        mAuth = FirebaseAuth.getInstance();

        //check if the user is logged in before
        if (mAuth.getCurrentUser() != null){
            Intent intent = new Intent(getContext(), MainActivity.class);
            startActivity(intent);
            Toast.makeText(getContext(), "Already Logged In", Toast.LENGTH_SHORT).show();
        }else {
            Toast.makeText(getContext(), "Please Login", Toast.LENGTH_SHORT).show();
        }

        //Bring the views from the xml to the class
        email = (EditText) view.findViewById(R.id.et_email);
        password = (EditText) view.findViewById(R.id.et_password);
        Button login = view.findViewById(R.id.btn_login);

        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                loginUser();
            }
        });
        return view;
    }

    public void loginUser(){
        //get the user details and add them to variables
        String login_email = email.getText().toString().trim();
        String login_password = password.getText().toString().trim();

        if  (login_email.isEmpty()){
            email.setError(getContext().getString(R.string.error_email));
        }else if (login_password.isEmpty()){
            password.setError(getContext().getString(R.string.error_password));
        }else if (login_password.length() <= 6) {
            password.setError(getContext().getString(R.string.error2_password));
        }else {

            mAuth.signInWithEmailAndPassword(login_email, login_password).addOnCompleteListener((Activity) getContext(),new OnCompleteListener<AuthResult>() {

                @Override
                public void onComplete(@NonNull Task<AuthResult> task) {
                    progressDialog = new SpotsDialog(getContext(), R.style.Custom);
//                    progressDialog.setMessage("Logging in. Please wait.");
                    progressDialog.show();

                    if (!task.isSuccessful()) {
//                        Toast.makeText(getContext(), R.string.error_login, Toast.LENGTH_SHORT).show();
                        Toast.makeText(getContext(), "Logging in Failed, Please Try Again." + task.getException(),
                                Toast.LENGTH_SHORT).show();
                    } else {
                        startActivity(new Intent(getContext(), MainActivity.class));
                        Toast.makeText(getContext(), "Logged In", Toast.LENGTH_SHORT).show();
                        ((Activity) getContext()).finish();
                    }
                }
            });
        }

    }
}
