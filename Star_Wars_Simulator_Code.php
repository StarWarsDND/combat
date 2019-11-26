<?php
#include <iostream>

using namespace std;

void combat1(string name1, string name2){ //Function that is called if user1 rolls higher on initiative.
    double hp1 = 100, fullHP1 = 100, hp2 = 100, fullHP2 = 100, dmg1, dmg2, totalDmg1, totalDmg2;

    while(hp2 > 0 && hp1 > 0){ //indicated to run this loop while the hp values are above 0 and terminate the loop once they are at or below 0

            cout << "enter damage done to " << name2 << ": "; //enter damage done
            cin >> dmg1;
            cout << endl << name1 << " has done " << dmg1 << " damage to " << name2 << endl << endl;
            hp2 -= dmg1;
            totalDmg1 += dmg1;
            cout << name2 << " has taken " << totalDmg1 << " total damage. \n" << endl;

            if (hp2 <= fullHP2/2 && hp2 > 1){ //this statement simply gives the 'Bloodied' status which happens at half health or lower
                cout << name2 << " is bloodied! \n" << endl;
            }

            if (hp2 <= 0){
                break;
            }

            cout << "enter damage done to " << name1 << ": ";
            cin >> dmg2;
            cout << endl << name2 << " has done " << dmg2 << " damage to " << name1 << endl << endl;
            hp1-=dmg2;
            totalDmg2+=dmg2;
            cout << name1 << " has taken " << totalDmg2 << " total damage. \n" << endl;

            if (hp1 <= fullHP1/2 && hp1 > 1){
                cout << name1 << " is bloodied! \n" << endl;
            }
    }

        if (hp2 <= 0){
            cout << name2 << " has been slain! \n" << endl;
        } else if (hp1 <= 0) {
            cout << name1 << " has been slain! \n" << endl;
        }

}

void combat2(string name1, string name2){ //Function that is called if user2 rolls higher on initiative.
    double hp1 = 100, fullHP1 = 100, hp2 = 100, fullHP2 = 100, dmg1, dmg2;
    double totalDmg1, totalDmg2;

    while(hp2 > 0 && hp1 > 0){ //indicated to run this loop while the hp values are above 0 and terminate the loop once they are at or below 0

            cout << "enter damage done to " << name1 << ": "; //enter damage done
            cin >> dmg2;
            cout << endl << name2 << " has done " << dmg2 << " damage to " << name1 << endl << endl;
            hp1-=dmg2;
            totalDmg2+=dmg2;
            cout << name1 << " has taken " << totalDmg2 << " total damage. \n" << endl;

            if (hp1 <= fullHP1/2 && hp1 > 1){ //this statement simply gives the 'Bloodied' status which happens at half health or lower
                cout << name1 << " is bloodied! \n" << endl;
            }

            if (hp1 <= 0){
                break;
            }

            cout << "enter damage done to " << name2 << ": ";
            cin >> dmg1;
            cout << endl << name1 << " has done " << dmg1 << " damage to " << name2 << endl << endl;
            hp2-=dmg1;
            totalDmg1+=dmg1;
            cout << name2 << " has taken " << totalDmg1 << " total damage. \n" << endl;

            if (hp2 <= fullHP2/2 && hp2 > 1){
                cout << name2 << " is bloodied! \n" << endl;
            }
    }

        if (hp1 <= 0){
            cout << name1 << " has been slain! \n" << endl;
        } else if (hp2 <= 0) {
            cout << name2 << " has been slain! \n" << endl;
        }

}

int main()
{
    double init1, init2;
    string pc1, pc2;

    cout << "This is a DND fight simulator in progress. \n" << endl;
    cout << "There will be two contestants \nPlease name contestant 1: ";
    getline(cin, pc1);
    cout << "Please name contestant 2: ";
    getline(cin, pc2);

    cout << "The two contestants are " << pc1 << " and " << pc2 << "! \n" << endl;
    cout << pc1 << " will roll for initiative!" << endl;
    cin >> init1;
    cout << pc2 << " will roll for initiative!" << endl;
    cin >> init2;

    if( init1 > init2){
        cout << endl << pc1 << " will go first! \n" << endl;
        combat1(pc1, pc2); //calls function combat1 based on who rolled higher
    } else {
        cout << endl << pc2 << " will go first! \n" << endl;
        combat2(pc1, pc2); // calls function combat2 based on who rolled higher
    }


    return 0;
}

</body>
</html>