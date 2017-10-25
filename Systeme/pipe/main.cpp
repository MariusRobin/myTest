#include <iostream>
#include <unistd.h>
#include <wait.h>

using namespace std;

struct Boite {
    int dedans;
};

void produire(int s){
    for (int i = 1; i<=10; i++) {
        Boite b;
        b.dedans = i;
        write(s, &b, sizeof(b));
    }
    close(s);
}

void filtre(int e, int s){
    bool ok=true;
    do {
        Boite b;
        int l = read(e,&b, sizeof(b));
        if(l>0) {
            if(b.dedans %3 != 0) {
                write(s, &b, sizeof(b));
            }
        } else {
            ok = false;
        }
    } while (ok);
    close(e);
    close(s);
}

void transformer(int e, int s){
    bool ok = true;
    do {
        Boite b;
        ok = read(e,&b,sizeof(b)) > 0;
        if(ok) {
            b.dedans *= 100;
            write(s, &b, sizeof(b));
        }
    } while (ok);
    close(e);
    close(s);
}

void consommer(int e)
{
    bool ok = true;
    do {
        Boite b;
        ok = read(e,&b,sizeof(b)) > 0;
        if(ok) {
        cout << "Entier ! " << b.dedans << endl;
        }
    } while (ok);
    close(e);
}

int main() {
    int a[2], b[2], c[2];

    pipe(a);
    pipe(b);
    pipe(c);

    if (fork() == 0) {
        close(a[0]); close(b[0]); close(b[1]);
        close(c[0]); close(c[1]);
        produire(a[1]);
        exit(EXIT_SUCCESS);
    }
    close(a[1]);

    if (fork() == 0) {
        close(b[0]);
        close(c[0]); close(c[1]);
        filtre(a[0], b[1]);
        exit(EXIT_SUCCESS);
    }
    close(a[0]); close(b[1]);

    if (fork() == 0) {
        close(c[0]);
        transformer(b[0], c[1]);
        exit(EXIT_SUCCESS);
    }
    close(b[0]);close(c[1]);

    if (fork() == 0) {
        consommer(c[0]);
        exit(EXIT_SUCCESS);
    }
    close(c[0]);

    for(int i = 0; i<4; i++) {
        int status;
        wait(&status);
    }
    exit(EXIT_SUCCESS);

}
