/* Link_Activity
 *
 * Fist version 
 *
 * 08/5/2013
 * 
 *This software is the confidential and proprietary information of:
 *	Nixon Espinoza Matamoros. 
 *	Mauricio Jiménez Gutiérrez.
 *	Jeudy Ramírez Trejos. 
 */
package com.example.self_guidedtour;

import com.actionbarsherlock.app.SherlockActivity;

import android.os.Bundle;
import android.annotation.SuppressLint;
import android.app.Activity;
import android.view.View;
import android.widget.ProgressBar;
import android.webkit.WebChromeClient;
import android.webkit.WebView;
import android.webkit.WebViewClient;

/**
 * This class creates the web-link of the selected item in the expandablelist
 * 
 * 
 * @author Nixon Espinoza, Mauricio Jiménez, Jeudy Ramírez.
 *
 */

public class Link_Activity extends SherlockActivity {
	/**browser is use to get the reference if the WebView in the xml file
	 * progressbar is used to get the reference of the 
	 * ProgressBar in the xml file*/
	 public static WebView browser;
	 public static String urls;
	 private ProgressBar progressBar;
	 
	    @SuppressLint("SetJavaScriptEnabled")
	    
	    /**Constructor that creates the UI of the link class,
	     * calling the xml link_activity in layout folder */
		@Override
	    public void onCreate(Bundle savedInstanceState)
	    {
	        super.onCreate(savedInstanceState);
	        setContentView(R.layout.link_activity);
	        //Set the reference of the webView
	        browser = (WebView)findViewById(R.id.webView1);
	        //Enables Javascript in the interface
	        browser.getSettings().setJavaScriptEnabled(true);
	        //Enables Zoom in the interface
	        browser.getSettings().setBuiltInZoomControls(true);
	        //Enable the web pluggins (flash)
	        browser.getSettings().setPluginsEnabled(true);
	        //Set the url to the web.
	        browser.loadUrl(urls);//esto dentro de un if
	        //Start webView
	        browser.setWebViewClient(new WebViewClient()
	        {
	           //The link are opened in the webview, not in the browser
	            @Override
	            public boolean shouldOverrideUrlLoading(WebView view, String url)
	            {
	                return false;
	            }   
	             
	        });
	        
	        //Set a progress bar, it provides feedback to the user.
	        progressBar = (ProgressBar) findViewById(R.id.progressbar);
	        //Start the connection
	        browser.setWebChromeClient(new WebChromeClient() 
	        {
	            @Override
	            public void onProgressChanged(WebView view, int progress) 
	            {               
	                progressBar.setProgress(0);
	                progressBar.setVisibility(View.VISIBLE);
	                Link_Activity.this.setProgress(progress * 1000);
	                //Increase the percentage of the progress Bar
	                progressBar.incrementProgressBy(progress);
	                //when the progress bar at 100% are vanish
	                if(progress == 100)
	                {
	                    progressBar.setVisibility(View.GONE);
	                }
	            }
	        });
	    }
}
