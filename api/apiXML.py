import json
import sys
import xml.etree.ElementTree as ET

villetrouve = {}

def trajet(var1,var2,var3,vue=[],distances={},precede={}):
    # permet d'afficher le résultat
    if var2 == var3:
        path=[]
        pred=var3
        while pred != None:
            path.append(pred)
            pred=precede.get(pred,None)
        affiche=path[0]
        fichiersize = len(path)-1
        str1 = ''
        for index in range(0,len(path)):
          fichieraprint = "<ville" + str(fichiersize-index) + ">" + path[index] + "</ville" + str(fichiersize-index) + ">"
          str1 += fichieraprint
        str1 += "<DistanceKm>" + str(distances[var3]) + "</DistanceKm>"
        print(str1)

    # permet de voir s'il y a de nouveaux voisins et de recalculer la distance
    else :
        if not vue:
            distances[var2]=0
        for LeVoisin in var1[var2] :
            if LeVoisin not in vue:
                nouvelle_distance = distances[var2] + var1[var2][LeVoisin]
                if nouvelle_distance < distances.get(LeVoisin,float('inf')):
                    distances[LeVoisin] = nouvelle_distance
                    precede[LeVoisin] = var2
        vue.append(var2)
        pasvue={}
        for k in var1:
            if k not in vue:
                pasvue[k] = distances.get(k,float('inf'))
        x=min(pasvue, key=pasvue.get)
        trajet(var1,x,var3,vue,distances,precede)

if __name__ == "__main__":
    f = open('../ville_et_voisinage.json')
    var1 = json.load(f)
    if sys.argv[1] != '' and sys.argv[2] != '':
        trajet(var1,sys.argv[1],sys.argv[2])
    else:
        print("erreur")
