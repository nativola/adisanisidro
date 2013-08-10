/* Parent
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

import java.util.ArrayList;

/**
 * This class contains the information of the objects in
 * the Expandable List.
 *  
 * @author Nixon Espinoza, Mauricio Jiménez, Jeudy Ramírez.
 *
 */

public class Parent {
	/***
	 * mTitle is used to set a object title
	 * mArrayChildren is used to set the children's or 
	 * Objects properties
	 * */
    private String mTitle;
    private ArrayList<String> mArrayChildren;
 
    public String getTitle() {
        return mTitle;
    }
 
    public void setTitle(String mTitle) {
        this.mTitle = mTitle;
    }
 
    public ArrayList<String> getArrayChildren() {
        return mArrayChildren;
    }
 
    public void setArrayChildren(ArrayList<String> mArrayChildren) {
        this.mArrayChildren = mArrayChildren;
    }
}