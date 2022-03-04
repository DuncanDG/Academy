package com.example.academy;

import android.os.Bundle;

import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;
import androidx.fragment.app.FragmentPagerAdapter;
import androidx.viewpager.widget.ViewPager;

import java.util.ArrayList;

public class LoginActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        //get the viewpager from the xml
        //the viewpager enables the fragments
        ViewPager viewPager = findViewById(R.id.viewPager);

        //This is a fragmentPagerAdapter that serves to connect the fragment and viewpager
        //first create an instance of the pageradapter
        AuthenticationPagerAdapter pagerAdapter = new AuthenticationPagerAdapter(getSupportFragmentManager());
        pagerAdapter.addFragmet(new LoginFragment());
        pagerAdapter.addFragmet(new RegisterFragment());
        viewPager.setAdapter(pagerAdapter);

    }

        class AuthenticationPagerAdapter extends FragmentPagerAdapter {
            private ArrayList<Fragment> fragmentList = new ArrayList<>();

            public AuthenticationPagerAdapter(FragmentManager fm) {
                super(fm,BEHAVIOR_RESUME_ONLY_CURRENT_FRAGMENT);
            }

            @Override
            public Fragment getItem(int i) {
                return fragmentList.get(i);
            }

            @Override
            public int getCount() {
                return fragmentList.size();
            }

            void addFragmet(Fragment fragment) {
                fragmentList.add(fragment);
            }
        }
    }
