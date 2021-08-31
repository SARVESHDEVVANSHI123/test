/* package codechef; // don't place package name! */

import java.util.*;
import java.lang.*;
import java.io.*;

/* Name of the class has to be "Main" only if the class is public. */
class Codechef
{
	public static void main (String[] args) throws java.lang.Exception
	{
     String str = "Hello World";  
        int[] freq = new int[str.length()];  
        int i, j;  
        char str1[]= new char[freq.length]; 
        //Converts given string into character array  
        char string[] = str.toCharArray();  
          
        for(i = 0; i <str.length(); i++) {  
            freq[i] = 1;  
            for(j = i+1; j <str.length(); j++) {  
                if(string[i] == string[j]) {  
                    freq[i]++;  
                      
                    //Set string[j] to 0 to avoid printing visited character  
                    string[j] = '0';  
                }  
            }  
        }  
          
        //Displays the each character and their corresponding frequency  
        System.out.println("Characters and their corresponding frequencies");  
        for(i = 0,j=0; i <freq.length; i++) {  
            if(string[i] != ' ' && string[i] != '0') 
                {
                    str1[i]=string[i];
                    System.out.println(i+"-"+string[i] + "-" + freq[i]);
                }
        }
        
        int n=freq.length;
        for(i = 0; i <n; i++) { 
                    for(j=i+1;j<n;j++){
                        if(freq[i]>freq[j]){
                            int temp=freq[j];
                            freq[j]=freq[i];
                            freq[i]=temp;
                            
                            char temp1=str1[j];
                            str1[j]=str1[i];
                            str1[i]=temp1;
                        }
                    }
        }
        
        
        for(i = str1.length-1; i>=0;--i) {
                    System.out.print(str1[i]);
        }
    }  
}
