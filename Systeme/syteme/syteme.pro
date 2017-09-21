TEMPLATE = app
CONFIG += console
CONFIG -= app_bundle
CONFIG -= qt

QMAKE_CXXFLAGS = -std=c++11
QMAKE_CXXFLAGS += -Wall -Wextra -pedantic
QMAKE_CXXFLAGS += -D_POSIX_C_SOURCE=200809L
QMAKE_CXXFLAGS += -D_XOPEN_SOURCE=700

SOURCES += main.cpp

include(deployment.pri)
qtcAddDeployment()

