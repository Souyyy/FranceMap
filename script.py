#!/usr/bin/python

import json # Import de librarie
import sys  # Import de librarie

def VoisinageVille(): #definition d'une fonction

  Ville = {}  #definition d'un dictionnaire
  LectureFranceMap = open("FRANCE.MAP", "r") #ouverture du fichier france.map
  lines = LectureFranceMap.readlines()  # la variable lines et defini pour lire les lines du fichier france.map

  for line in lines: # une boucle for qui tourne tout le fichier
    line = line.split() # ici si la ligne est vide on split
    if len(line) == 3:  # ici si la ligne contient 3 valeur alors
      voisinage = line[0]   # la voisinage contiendra la premiere valeur des 3 valeurs
      Ville[voisinage] = {} #on defini voisinage dans le dictionnaire Ville{}
    elif len(line) == 2: # ici si la ligne contient 2 valeur alors
      Ville[voisinage][line[0]] = int(line[1]) #on defini voisinage ainsi que sa valeur dans le dictionnaire Ville{} en dessous de la clé*

  json_object = json.dumps(Ville, indent = 2) # on defini la variable json_object pour affichier le code json de ville{} avec une indentation
  with open("ville_et_voisinage.json", "w") as outfile: #ici on ouvre un fichier ville_et_voisinage.json
    outfile.write(json_object) # et on ecrit dedant json_object qui contient ville{}

VoisinageVille() # on execute la fonction

def trajet(var1,var2,var3,vue=[],distances={},precede={}):  # ici on defini la fonction trajet avec plusieurs parametre var1, var2, var3, vue=[], distances={}, precede={}

    if var2 == var3: #si la var2 est egale a la var3
        path=[] #on defini une list nommé path
        pred=var3 #est une variable pred qui est egale a var3
        while pred != None: # et tant que pred n'est pas vide
            path.append(pred) #on fait ajouter a path, pred
            pred=precede.get(pred,None) #est on fait definir pred pour qu'il soit egale a precede
        affiche=path[0] # on defini affiche pour qu'il soit egale a path[0]
        for index in range(1,len(path)): # boucle qui tourne le nombre de fois la taille de path
            affiche = path[index] + '<li class="default"><div><a href="">' + affiche
        print('<li class="default"><div><a href="">' + affiche + '</a></div></li>'+ '</div>' + '<h2 style="margin-top: -5%;padding: 8px;">' + "Ce trajet vaut " + str(distances[var3]) + "KM</h2>" + '<div class="center" style=" margin-bottom: 2%;"><a href="https://theo-loic.alwaysdata.net/" style="text-decoration: none;"><button type="submit" id="button1" name="submit">RETOUR ACCEUIL</button></a></div>')
        #on fait afficher le resultat ici
    else : # sinon
        if not vue: # si il n'y a pas la variable vue
            distances[var2]=0    #la list distance avec comme valeur arg2 est defini a 0
        for LeVoisin in var1[var2] :  #boucle LeVoisin dans var1[var2]
            if LeVoisin not in vue: # Si levoisin n'est pas dans vue alors
                nouvelle_distance = distances[var2] + var1[var2][LeVoisin]  # la variable nouvelle distance
                if nouvelle_distance < distances.get(LeVoisin,float('inf')):    #Si la variable nouvelle_distance est inférieur à distances.get(LeVoisin,float('inf')
                    distances[LeVoisin] = nouvelle_distance #alors distance LeVoisin = nouvelle_distance
                    precede[LeVoisin] = var2 # est precede[LeVoisin] est egale a var2
        vue.append(var2)#On ajoute var2 dans vue
        pasvue={}  #definition dictionnaire pasvue
        for k in var1: #boucle k dans var1
            if k not in vue: #si k n'est pas ddans vue alors
                pasvue[k] = distances.get(k,float('inf'))
        x=min(pasvue, key=pasvue.get)
        trajet(var1,x,var3,vue,distances,precede)

if __name__ == "__main__":
    f = open('ville_et_voisinage.json') # ouvre le document ville_et_voisinage.json
    var1 = json.load(f) #var1 initialise le fichier
    if sys.argv[1] != '' and sys.argv[2] != '': #si la partie qui permet de recup ville de départ et ville d'arrivé dans le php du site
        trajet(var1,sys.argv[1],sys.argv[2]) #utilise la ville de départ et ville d'arrivé dans le php du site pour executer la fonction trajet
    else: #sinon
        print("erreur") #affichier une erreur
