 #include <iostream>
#include <unistd.h>
#include <stdio.h>
#include "wait.h"
#include "vector"
#include "array"


using namespace std;
vector<pid_t> placement;
int place=1;
vector<char*> nomEquipe;

int attendre(){
    return  (1+rand()%(11-1+1));
}

void lancerProcessusFils(int argc, char *argv[])
{
    int i, j;
    int estTombeOuPas;

    /* boucle pour creer les 6 processus fils */
    for (i=1; i < argc; i++) {
        switch (fork()) {
        case -1: fprintf(stderr, "Erreur dans %d\n", getpid());
            perror("fork");
            exit(1);
        case 0: /* On est dans un fils */
            for (j=1;j<=4;j++){
                srand(time(NULL)-getpid());
                estTombeOuPas = (int)(rand() % 10) + 1;
                if(estTombeOuPas==1&&j>1){
                    cout << "\n le coureur de l'equipe "<< argv[i] << " est tombé\n" << endl;
                    exit(EXIT_FAILURE);

                }
                else
                {
                    srand(time(NULL)-getpid());
                    cout <<"Le courreur " << j << " l'équipe " << argv[i] <<" est parti" << endl;
                    sleep(attendre());

                }

            }
            cout<<"\n Le coureur de l'équipe "<<argv[i]<<" est arrivé !\n"<<endl;


            /* Ne pas oublier de sortir sinon on cree fact(6) processus */
            exit(2);
        default:
            ;/* On est dans le pere; ne rien faire */
        }
    }
}

void affichageArrive(int argc, char *argv[])
{
    int status;
    for (int i=1;i<argc;i++)
    {
        int leWait = wait(&status);
        if (WEXITSTATUS(status)==2)
        {
            placement.push_back(leWait);
        }
    }
    for (auto elem : placement)
    {
        cout << place++ << ". " << elem << endl;
    }
}

int main(int argc,char *argv[]) {


    lancerProcessusFils(argc, argv);
    affichageArrive(argc, argv);
    return 0;
}
