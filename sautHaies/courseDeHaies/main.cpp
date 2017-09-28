#include <iostream>
#include <unistd.h>
#include <stdio.h>
#include "wait.h"


using namespace std;

int attendre(){
    return  (8+rand()%(11-8+1));
}

int main() {
    int i, j;
    /* boucle pour creer les 6 processus fils */
    for (i=1; i < 7; i++) {
        switch (fork()) {
        case -1: fprintf(stderr, "Erreur dans %d\n", getpid());
            perror("fork");
            exit(1);
        case 0:  /* On est dans un fils */

            for (j=1;j<=4;j++){
                srand(time(NULL)-getpid());
                cout <<"Le courreur " << j << " l'équipe " << getpid() << " est parti" << endl;
                sleep(attendre());

            }
            cout<<" - "<<getpid()<<endl;
            /* Ne pas oublier de sortir sinon on cree fact(6) processus */
            exit(0);
        default:/* On est dans le pere; ne rien faire */ ;
        }
    }
       wait(NULL);


    return 0;
}
