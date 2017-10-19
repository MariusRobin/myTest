#include <stdio.h>
#include <unistd.h>
#include <iostream>
#include <vector>
#include <sstream>
#include "map"
#include "wait.h"

using namespace std;

using Action = void(*)(vector<string>);

bool fini;

pid_t lepid;

map<string, pid_t> jobs;

vector<string> lesnomdesgens;

void action_help(vector<string> mot){
    cout << "-----------"<< mot[0] << "-----------" << endl;
    cout << "- tapez exit pour arreter" << endl;
    cout << "- tapez cd suivi d'un fichier pour changer de fichier" << endl;
    cout << "- tapez ! pour lancer un sous shell" << endl;
    cout << "- tapez ! suivi d'une commande pour executer une commande dans le sous shell" << endl;
    cout << "- tapez rappel suivi du timer en secondes et du texte de votre rappel" << endl;
}

void action_exit(vector<string> mot){
    cout << "-----------"<< mot[0] << "-----------" << endl;
    fini = true;
}

void action_sousBashShell(vector<string> mot){
    if (mot.size() > 1)
    {
        ostringstream action;
        string act = "";
        for (unsigned int i=1; i< mot.size(); i++){
            action << mot[i]+" ";
            act = action.str();
        }
        system(act.c_str());
    }
    else{
        system("/bin/bash");
    }
}

void action_cd(vector<string> mot){
    string fichier;

    if (mot.size()>1)
    {
        fichier = mot[1];
    }
    else
    {
        fichier = "/home";
    }
    char directory[1024];
    getcwd(directory, sizeof(directory));
    printf("Vous êtiez dans : %s\n", directory);

    if(chdir(fichier.c_str()) == 0) {
        getcwd(directory, sizeof(directory));
        printf("Vous êtes désormais dans : %s\n", directory);
    }
    else cerr << "Erreur, veuillez réessayer" << endl;
}

void action_rappel(vector<string> mot){
    string rappel;
    pid_t p = fork();

    if(mot.size()>2)
    {
        if (p == 0){
            sleep(atoi(mot[1].c_str()));
            for (unsigned int i=2; i<mot.size(); i++){
                rappel += mot[i]+" ";
            }
            cout << "Rappel : " << rappel <<endl;
        }

    }
    else
    {
        cout << "Il manque des arguments" << endl;
    }
}

void action_jobs(vector<string> mot)
{
    for (auto elem : lesnomdesgens)
    {
        cout << "[" << jobs[elem] << "] : " << elem << endl;
    }
}

vector<string> decouper(const string &ligne)
{
    vector<string> mots;
    istringstream in (ligne);
    string m;
    while (in >> m) {
        mots.push_back(m);
    }
    return mots;
}

void fin_fils(int sig){
    pid_t p =wait(nullptr);
    string lenom;
    for (auto elem : lesnomdesgens)
    {
        if (jobs[elem]==p)
        {
            lenom=elem;
            cout << "fin de " << lenom << " !" <<endl;
            //cout << "> ";
            jobs[elem] = 0;
            jobs.erase(elem);
            break;
        }
    }
}

const map<string, Action> actions{
    { "help", action_help},
    { "exit", action_exit},
    { "!",action_sousBashShell},
    { "cd", action_cd},
    { "rappel", action_rappel},
    { "jobs", action_jobs}
};

int main()
{

    fini = false;

    while (!fini)
    {
        string chaine;
        cout << "> ";
        getline(cin, chaine);
        while (chaine.size()==0){
            cout << "> ";
            getline(cin, chaine);
        }
        vector<string> mot = decouper(string(chaine));

        string test;
        auto it = actions.find(mot[0]);

        if(it == actions.end()){
            pid_t p = fork();
            string lemot;
            for (string elem : mot)
            {
                lemot += elem+" ";
            }
            lepid = p;
            if (mot[mot.size()-1]=="&")
            {
                jobs[lemot] = lepid;
                lesnomdesgens.push_back(lemot);
            }

            signal(SIGCHLD, fin_fils);

            if(p==-1){
                cerr << "Erreur" << endl;
            }
            else
                if (p==0){
                    const char * a[mot.size()];
                    int i=0;
                    for(string elem : mot)
                    {
                        if(elem != "&")
                        {
                            a[i]= elem.c_str();
                            i++;
                        }
                        else
                        {
                            test = elem;
                        }

                    }
                    a[i]=nullptr;

                execvp(a[0], const_cast<char **>(a));
                exit(EXIT_SUCCESS);
        }
    }
    else{
        it->second (mot);
    }

    int status;
    if(mot[mot.size()-1] != "&")
    {
        if(mot[mot.size()-1] != "jobs")
        {
            wait(&status);
        }
    }
    else
    {
        cout << "[" << lepid << "]";
        for (int i =0;i<mot.size()-1;i++)
        {
            cout << " " << mot [i];
        }
        cout << endl;
    }
}

return 0;
}

