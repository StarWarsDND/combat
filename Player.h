// the player class to define the elements required for player
#ifndef Player_H
#define PLAYER_H

#include <iostream>
#include <string> // to use the string class

using namespace std;

//Class declaration
class Player {
	private:
		//basic player info
		int userid;
		string username;
		string password;
		string characterName;
		string role;
		
		
	
	public:
		//Default constructor
		Player () {
			userid = 0;
			username = "";
			password = "";
			characterName = "";
			role = "";
		
		}
		
		//Constructor for user input:
		Player (int uid, string name, string pw, string cn, string r){
			userid = uid;
			username = name;
			password = pw;
			characterName = cn;
			role = r;
			string skills;
		}
		
	
	//Mutator/Setter functions
   void setUserID(int uid)
   {
   		userid = id;
   }
   
   void setUserName (string name){
   		username = name;
   }
   
   void setPassword (string pw){
   		password = pw;
   }
   
   void setCharacterName (string cn){
   		characterName = cn;
   }
   
   void setRole (string r){
   		role = r;
   }
   
   //Accessor/Getter Functions
   int getUserID() const {
   		return userid;
   }

   string getUserName() const{
   		return username;
   }	
   
   string getPassword() const{
   		return password;
   }
   
   string getCharacterName() const{
   		return characterName;
   }
   
   string getRole() const {
   		return role;
   }
	
	
};
