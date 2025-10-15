# Sécurisation de l’application « Bibliothèque »

## Authentification 48h et Protection CSRF

![auth_48h.png.png](docs%2Fscreenshots%2Fauth_48h.png.png)

## Cookie du mode affichage 

![darkmodeFakse.png](docs%2Fscreenshots%2FdarkmodeFakse.png)
![darkmodeTrue.png](docs%2Fscreenshots%2FdarkmodeTrue.png)


## vulnérabilités potentielles des dépendances

Commannde : composer audit

Résultat : liste d’avertissements / CVE avec la version vulnérable et recommandations

![vulne1.png](docs%2Fscreenshots%2Fvulne1.png)
![vulne2.png](docs%2Fscreenshots%2Fvulne2.png)


## Difficultés rencontrées et solutions

J'ai eu un gros problèmes avec le register, mais après beaucoup beaucoup d'essaies, j'ai enfin réussi à couvrir le problème.
Et j'ai eu beaucoup de mal à juste faire le composer install, il ne voulait pas le faire, j'ai du refaire le projet de 0 et créer petit à petit.
Mais j'ai enfin réussi à le faire malgrès le temps perdu..


# Bilan des acquis


Ce projet m’a permis de comprendre concrètement la sécurisation d’une application web Symfony.
J’ai appris à :

- Configurer les sessions et cookies sécurisés (durée, flags HttpOnly, SameSite, Secure).

- Mettre en place une politique CSP pour limiter les ressources externes.

- Gérer l’authentification et les rôles utilisateurs de manière stricte.

- Comprendre et vérifier la protection CSRF sur les formulaires.

- Utiliser les outils Composer pour détecter les vulnérabilités.

- Appliquer des contraintes fortes sur les mots de passe pour renforcer la sécurité.

Globalement, j’ai renforcé ma compréhension des bonnes pratiques OWASP et des mécanismes internes de sécurité de Symfony.

