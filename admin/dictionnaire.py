import json # Import de librarie

def VoisinageVille(): #definition d'une fonction

  Ville = {} #definition d'un dictionnaire
  LectureFranceMap = open("../FRANCE.MAP", "r") #ouverture du fichier france.map
  lines = LectureFranceMap.readlines() # la variable lines et defini pour lire les lines du fichier france.map

  for line in lines: # une boucle for qui tourne tout le fichier
    line = line.split() # ici si la ligne est vide on split
    if len(line) == 3: # ici si la ligne contient 3 valeur alors
      voisinage = line[0]  # la voisinage contiendra la premiere valeur des 3 valeurs
      Ville[voisinage] = {} #on defini voisinage dans le dictionnaire Ville{}
    elif len(line) == 2: # ici si la ligne contient 2 valeur alors
      Ville[voisinage][line[0]] = int(line[1])#on defini voisinage ainsi que sa valeur dans le dictionnaire Ville{} en dessous de la clé*

  json_object = json.dumps(Ville, indent = 2)  # on defini la variable json_object pour affichier le code json de ville{} avec une indentation

  with open("../ville_et_voisinage.json", "w") as outfile: #ici on ouvre un fichier ville_et_voisinage.json
    outfile.write(json_object) # et on ecrit dedant json_object qui contient ville{}

VoisinageVille()# on execute la fonction
