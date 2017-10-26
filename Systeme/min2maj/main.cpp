#include <iostream>
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <fstream>
#include <sys/types.h>
#include <sys/stat.h>
#include <fcntl.h>
#include <vector>

using namespace std;

void executer_programme(const vector<string> & mots)
{
    int ind = mots.size();
    if (mots[ind-1] == "r.txt")
    {
        int f1 = open("r.txt", O_CREAT | O_WRONLY, 0644);
        dup2(f1, STDOUT_FILENO);
        close(f1);

        execl(mots[0], mots[0],mots[1],NULL);
    }
}


int main()
{
    int f1 = open("entree.txt", O_CREAT | O_RDONLY, 0644);
    dup2(f1, STDIN_FILENO);
    close(f1);

    int f2 = open("sortie.txt",O_CREAT | O_WRONLY, 0644);
    dup2(f2, STDOUT_FILENO);
    close(f2);

    execl("/usr/bin/tr","tr","[a-z]","[A-Z]",NULL);
    return 0;
}
