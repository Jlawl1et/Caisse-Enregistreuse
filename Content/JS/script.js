let ajouter=document.querySelectorAll("#abc");
let valider= document.getElementById('payer')
let panier=document.querySelector('.panier');
let annuler=document.getElementById('vider');
let liste_achat=[];




/*------------------------------------EVENT---------------------------------------*/

for(let i=0;i<ajouter.length;i++){
    ajouter[i].addEventListener('click',function (){
        let p=document.querySelectorAll(".prix_prod");
        let prix=p[i].textContent;
        let n=document.querySelectorAll(".nom_prod");
        let nom=n[i].textContent;
        let q=document.querySelectorAll("#quantite");
        let quantite=q[i].value;
        ajouter_article(nom,prix,quantite);
        calcul_total();
    });
}

valider.addEventListener('click',function (){
    reinitialiser();
    console.log(liste_achat.length);
    let liste_nom=document.querySelectorAll('.nom');
    for (let i=0;i<liste_nom.length;i++){
        liste_achat.push(liste_nom[i]);
    }
    vider();
    let inserer=document.querySelector(".inserer");
    inserer.textContent="0";
    let point=document.querySelector("#r");
    point.value=0;
    console.log(liste_achat.length);

});

panier.addEventListener('click',function(e){
    const target=e.target.closest(".supp");
    if (target){
        target.parentNode.remove();
    }
    calcul_total();
})


annuler.addEventListener('click',function (){
    vider();
    calcul_total();
})


/* ---------------------------------FONCTIONS------------------------------------------------*/
function ajouter_article(nom_article,prix_article,quantite_article){
    let div=document.createElement('div');
    div.className="elt";
    let p_article=document.createElement('p');
    p_article.className="nom";
    let p_prix=document.createElement('p');
    p_prix.className="p_ticket";
    let p_quantite=document.createElement('p');
    p_quantite.className="q_ticket";
    let p_p=document.createElement('p');
    p_p.className="supp";
    if(nom_article.length>17){
        nom_article=nom_article.substring(0,17);
    }
    p_p.textContent="❌";
    p_article.textContent=nom_article;
    p_prix.textContent=prix_article;
    p_quantite.textContent=quantite_article;
    div.append(p_article);
    div.append(p_prix);
    div.append(p_quantite);
    div.append(p_p);
    let bloc=document.querySelector(".panier");
    bloc.append(div);
}


function calcul_total(){
    let nb=document.querySelectorAll(".p_ticket");
    let q=document.querySelectorAll(".q_ticket");
    let res=0;
    for(let i=0;i<nb.length;i++){
        res+=nb[i].textContent.substring(0,4)*q[i].textContent;
    }
    let inserer=document.querySelector(".inserer");
    inserer.textContent=Math.round(res * 100) / 100;
}

function reinitialiser(){
    for(let i=liste_achat.length;i>0;i=i-1){
        liste_achat.pop();
    }
}

function vider(){
    let p=document.querySelectorAll('.elt');
    for (let i=0;i<p.length;i++){
        p[i].remove();
    }
    let q=document.querySelectorAll('.qt');
    for (let i=0;i<q.length;i++){
        q[i].value=1;
    }
}

/*--------------------DATABASE------------------*/