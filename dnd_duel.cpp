// This app runs the combat simulator, using the Player class
#include <iomanip>
#include <iostream>
#include "Player.h"
#include "Profile.h"

using namespace std;

int main()
{
    int hp1 = 100, fullHP1 = 820, hp2 = 100, fullHP2 = 980, dmg1, dmg2, totalDmg1, totalDmg2; //Establishing the values used in the code.
   	int qs1 = 21;
    int	qs2 = 53;
    string name[]={"Ahsoka", "Vader"};

    while(hp2 > 0 && hp1 > 0){ //indicated to run this loop while the hp values are above 0 and terminate the loop once they are at or below 0

            cout << " Enter die value for: " << name[1] << ": "; //enter damage done
            cin >> dmg1;
            cout << endl << " "<< name[0] << " has done " << dmg1 + qs1 << " damage to " << name[1] << endl << endl;
            hp2 -= (dmg1 + qs1);
            totalDmg1 += (dmg1 + qs1);
            cout << " " << name[1] << " has taken " << totalDmg1 << " total damage. \n" << endl;

            if (hp2 <= fullHP2/2 && hp2 > 1){ //this statement simply gives the 'Bloodied' status which happens at half health or lower
                cout << " " << name[1] << " is bloodied! \n" << endl;
            }

            if (hp2 <= 0){
                break;
            }

            cout << " Enter die value for: " << name[0] << ": ";
            cin >> dmg2;
            cout << endl << " " << name[1] << " has done " << dmg2 + qs2 << " damage to " << name[0] << endl << endl;
            hp1-=(dmg2 + qs2);
            totalDmg2+=(dmg2 + qs2);
            cout << " " << name[0] << " has taken " << totalDmg2 << " total damage. \n" << endl;

            if (hp1 <= fullHP1/2 && hp1 > 1){
                cout << " " << name[0] << " is bloodied! \n" << endl;
            }

    }

    if (hp2 <= 0){
        cout << " " << name[1] << " has been slain! \n" << endl;
    } else if (hp1 <= 0) {
        cout << " " << name[0] << " has been slain! \n" << endl;
    }


    return 0;
}
