package com.example.academy;

import androidx.appcompat.app.AlertDialog;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;
import androidx.cardview.widget.CardView;

import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.Color;
import android.net.Uri;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;

import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;

import java.util.Objects;


public class MainActivity extends AppCompatActivity {

    private FirebaseUser mAuth;
    private FirebaseAuth auth;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        //initialize the FirebaseAuth instance
        auth = FirebaseAuth.getInstance();

         //get user details
        FirebaseUser user = auth.getCurrentUser();
        if (user != null) {
            // Name, email address, and profile photo Url
            String name = user.getDisplayName();
            String email = user.getEmail();
            Uri photoUrl = user.getPhotoUrl();

            // Check if user's email is verified
            boolean emailVerified = user.isEmailVerified();

            // The user's ID, unique to the Firebase project. Do NOT use this value to
            // authenticate with your backend server, if you have one. Use
            // FirebaseUser.getIdToken() instead.
            String uid = user.getUid();

            // assigning ID of the toolbar to a variable
            Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);

            // using toolbar as ActionBar
            setSupportActionBar(toolbar);

            // Display application icon in the toolbar
            // getSupportActionBar().setLogo(R.id.home);
            Objects.requireNonNull(getSupportActionBar()).setDisplayShowHomeEnabled(true);
            getSupportActionBar().setTitle("Welcome");
            getSupportActionBar().setSubtitle(email);
            toolbar.setTitleTextColor(Color.WHITE);
            toolbar.setSubtitleTextColor(Color.WHITE);
            getSupportActionBar().setDisplayUseLogoEnabled(true);
        }

        //assign the view ids to variables
        CardView register = findViewById(R.id.register);

        //add an onclickistener
        register.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(MainActivity.this, Course_RegisterActivity.class);
                startActivity(intent);
            }
        });
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.main_menu, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.logout) {

            //create the alertdialog
            AlertDialog.Builder builder = new AlertDialog.Builder(MainActivity.this);
            builder.setTitle("Logout");
            builder.setMessage("Do you want to Logout ?");
            builder.setCancelable(true);
            builder.setPositiveButton("Yes", new DialogInterface.OnClickListener() {
                @Override
                public void onClick(DialogInterface dialogInterface, int i) {
                    auth.signOut();
                    finish();
                    Toast.makeText(MainActivity.this, "Logged Out", Toast.LENGTH_LONG).show();
                }
            });
            builder.setNegativeButton("No", new DialogInterface.OnClickListener() {
                @Override
                public void onClick(DialogInterface dialogInterface, int i) {
                    dialogInterface.cancel();
                }
            });
            AlertDialog alertDialog = builder.create();
            alertDialog.show();

            return true;
        }
        return super.onOptionsItemSelected(item);
    }
}
















    // ----------------  Alert Dialogue -----------------


    // Declare the onBackPressed method
    // when the back button is pressed
    // this method will call
//    @Override
//    public void onBackPressed() {
//        // Create the object of
//        // AlertDialog Builder class
//        AlertDialog.Builder builder = new AlertDialog.Builder(MainActivity.this);
//
//        // Set the message show for the Alert time
//        builder.setMessage("Do you want to Logout ?");
//
//        // Set Alert Title
//        builder.setTitle("Logout");
//
//        // Set Cancelable false
//        // for when the user clicks on the outside
//        // the Dialog Box then it will remain show
//        builder.setCancelable(true);
//
//        // Set the positive button with yes name
//        // OnClickListener method is use of
//        // DialogInterface interface.
//
//        builder.setPositiveButton("Yes", new DialogInterface.OnClickListener() {
//            @Override
//            public void onClick(DialogInterface dialog, int which) {
//                // When the user click yes button
//                // then app will close
//                FirebaseAuth.getInstance().signOut();
//                finish();
//            }
//        });
//
//        // Set the Negative button with No name
//        // OnClickListener method is use
//        // of DialogInterface interface.
//        builder.setNegativeButton("No", new DialogInterface.OnClickListener() {
//            @Override
//            public void onClick(DialogInterface dialog, int which) {
//
//                // If user click no
//                // then dialog box is canceled.
//                dialog.cancel();
//            }
//        });
//
//        // Create the Alert dialog
//        AlertDialog alertDialog = builder.create();
//
//        // Show the Alert Dialog box
//        alertDialog.show();
//    }
