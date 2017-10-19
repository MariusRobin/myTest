#include <iostream>
#include <unistd.h>
#include <wait.h>

using namespace std;

struct Message {
    int data;
};
// choix : transmission de structures
// de taille fixe
void produire(int sortie)
{
    for (int i = 1; i<=10; i++) {
        Message m;
        m.data = i;
        write(sortie, & m, sizeof m);
    }
    close(sortie);
}

void consommer(int entree)
{
    while (true) {
        Message m;
        int lus = read(entree, & m, sizeof m);
        if (lus != sizeof m) {
            break;
        }
        cout << m.data << endl;
    }
    close(entree);
}


//void nonMultipleDe3 (int entree)
//{
//    while (true) {
//        Message m;
//        int lus = read(entree, & m, sizeof m);
//        if (lus != sizeof m) {
//            break;
//        }
//        if (m.data%3 != 0)
//            write(entree, & m, sizeof m);
//    }
//    close(entree);
//}

int main()
{
    int fds[2];
    pipe(fds);
    int entree = fds[0], sortie = fds[1];
    if (fork() == 0) { // processus fils
        close(entree);
        produire(sortie);

        exit(EXIT_SUCCESS);
    }
    close(sortie);
    // père


    //nonMultipleDe3(entree);

    consommer(entree);
    wait (nullptr);
    exit(EXIT_SUCCESS);
}

