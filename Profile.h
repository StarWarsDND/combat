// the player class to define the elements required for player profile

#ifndef PROFILE_H
#define PROFILE_H

#include <iostream>
#include <string> // to use the string class
#include "Player.h"


using namespace std;

//Class declaration
class Profile : public Player {
	
	//define elements
	private:
		//character stats
		string skills;
		int abilityScore;
		int modifier;
		int proficiency;
		int difficulty;
		int scoreVariant;
		int scoreQualifier;

	
		
	public:
		// default constructor:
		Profile (): Player(){
			skills = "";
			abilityScore = 0;
			modifier = 0;
			proficiency = 0;
			difficulty = 0;
			scoreVariant = 0;
			scoreQualifier = 0;
		}	
		
		// constructor from user input:
		Profile (string skls, int as, int m, int p, int d, int sv, int sq) : Player (uid, name, pw, cn, r) {
			skills = skls;
			abilityScore = as;
			modifier = m;
			proficiency = p;
			difficulty - d;
			scoreVariant = sv;
			scoreQualifier = sq;
		}
				
	// Setter functions
	void setSkills (string skls){
		skills = skls;
	}

	void setAbilityScore (int as)  {
		abilityScore = as;
	}

	void setModifier(int m){
		modifer = m;
	}

	void setProficiency(int p){
		proficiency = p;
	}
	
	void setDifficulty(int d){
		difficulty = d;
	}
	
	void setScoreVariant(int sv){
		scoreVariant = sv;
	}
	
	void setScoreQualifier (int sq){
		scoreQualifier = sq;
	}

	// Getter functions	
	string getSkills() const {
		return skills;
	}
	
	int getAbilityScore() const{
		return abilityScore;
	}

	int getModifier() const {
		return modifier;
	}
	
	int getProficiency() const {
		return proficiency;
	}

	int getDifficulty() const {
		return difficulty;
	}
	
	int getScoreVariant() const {
		return scoreVariant;
	}

	int getScoreQualifier() const {
		return scoreQualifier;
	}

};
