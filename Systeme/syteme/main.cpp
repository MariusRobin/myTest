#include <stdio.h>
#include <unistd.h>
#include <iostream>
#include <vector>
#include <sstream>
#include "map"

using namespace std;

using Action = void(*)(vector<string>);

bool fini;

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

const map<string, Action> actions{
    { "help", action_help},
    { "exit", action_exit},
    { "!",action_sousBashShell},
    { "cd", action_cd},
    { "rappel", action_rappel}
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

        auto it = actions.find(mot[0]);
        if(it == actions.end()){
            cout << "Commande '" << mot[0] << "' inconnue" << endl;
        }
        else{
            it->second (mot);
        }

    }

    return 0;
}

