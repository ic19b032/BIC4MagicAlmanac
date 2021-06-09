# BIC4 Project: Magic almanac

## Butschek, Hanausek, Huber, Jeschek, Sahin



## Description

This software **lists** magic **spells** and **kinds** belonging to them.
It is possible to **search** for **spells** by various **parameters**.
It is also possible to **create** new spells and **edit** existing ones.
It is necessary to **specify** a **kind** to which the spell belongs.

You can also **list** all **kinds**.
It is also possible to **create** and **edit** kinds.

This project shows the basic usage of the **Laravel** framework in combination with VueJS.



## Functionality

### Welcome
A **startpage**, which is shown to a **guest** (i.e. someone, who is not logged in).
Also the **web application name** is presented.
From there you can login and register.
A **login** requires an email and a password.
For a **registration** a name, email and password are required. 
After a successful registration/login, the dashboard shows.

### Home
The **startpage**/dashboard shown to a logged in user.
A welcome message to the logged in user and his/her **username** are displayed.
On the **left top** you can choose between **Home**, creating/listing **spells** and creating/listing **kinds**.
In the **upper right** corner you can see your **username**, and the option to **log out** by hovering over the displayed username.



### Create spells

Here you can **create** a new spell.
You need to provide a name, kind, quote, and a description.
A **kind category** is chosen automatically, so it is not possible to deselect/not choose a kind.
After successful creation, the spell will show in the spells list.

### List spells
Here all the spells and their corresponding kinds are **listed**.
It is possible to **search** a spell by a **partial match** in one of the categories from spell or kind.
It is also possible to **edit/delete** spells.

### Edit spells
Here you can **change** the kind, quote, and description of the spell. The name is not changeable.



### Create kinds

Here you can **create** a new kind.
You need to provide a name and a description.
After successful creation, the kind will show in the kinds list.

### List kinds
Here you can **list all** kinds. It is not possible to search for kinds here.
It is  possible to **edit/delete** kinds.

### Edit kinds
Here you can **edit** a kind by changing its description.
The name of the kind is not changeable.



## Angabe

### Already providing

All routes that are needed are implemented:
 * **GET** ```/spell``` &rarr; Lists all spells
 * **GET** ```/list/spell``` &rarr; Returns JSON of all spells
 * **GET** ```/list/kind``` &rarr; Returns JSON of all kinds
 * **POST** ```/spell``` &rarr; Stores new spells
 * **GET** ```/spell/{slug}``` &rarr; Show spell
 * **PUT** ```/spell/{slug}``` &rarr; Update spell
 * **DELETE** ```/spell/{slug}``` &rarr; Delete spell
 * **GET** ```/spell/{slug}/edit``` &rarr; Edit spell
 * **GET** ```/search/spell``` &rarr; Search spells
 * **POST** ```/search/spell``` &rarr; Query spells
 * **GET** ```/kind``` &rarr; Lists all kinds
 * **GET** ```/list/kind``` &rarr; Returns JSON of all kinds
 * **POST** ```/kind``` &rarr; Stores new kinds
 * **GET** ```/kind/{slug}``` &rarr; Show kind
 * **PUT** ```/kind/{slug}``` &rarr; Update kind
 * **DELETE** ```/kind/{slug}``` &rarr; Delete kind
 * **GET** ```/kind/{slug}/edit``` &rarr; Edit kind

All views can be found in ```/resources/views```.

### TODO

#### VueJS

Implement your [VueJS](https://vuejs.org) components in the folder ```/resources/js/components```.
Register your components in ```/resources/js/app.js``` and use them in the following files:

 * ```/resources/views/kind```
     * ```/resources/views/kind/create.blade.php```
     * ```/resources/views/kind/edit.blade.php```
     * ```/resources/views/kind/index.blade.php```
     * ```/resources/views/kind/show.blade.php```
 * ```/resources/views/spell```
      * ```/resources/views/spell/create.blade.php```
      * ```/resources/views/spell/edit.blade.php```
      * ```/resources/views/spell/index.blade.php```
      * ```/resources/views/spell/search.blade.php```
      * ```/resources/views/spell/show.blade.php```
      

To query data for dropdowns in forms or to reload lists use the list routes:
 * **GET** ```/list/spell```
 * **GET** ```/list/kind```

For the search form use ```q``` as the name for the text input.
The search will be handled by the backend.

#### CSS (SCSS)

The design of the software need to be adapted.
[Bulma](https://bulma.io) is used to layout and style the website.
If wanted default styles can be overwritten by setting variables in the ```/resources/sass/_variables.scss``` file.
Also it is possible to write custom styles in ```/resources/sass/_custom.scss```.

A new logo need to be set. If pictures will be present on the website place them in ```/public/img``` folder.
Here you will also find the logo.

### Hints

#### JavaScript and CSS (SCSS)

To compile scss and JavaScript ```npm run dev``` need to be executed in the project folder.
It is also possible to run ```npm run watch``` so it is not need to execute ```npm run dev``` every time a change happend. 

#### Data for Database

To make starting developing fast there are some seeders implemented to fill all needed tables except the user table.
To populate the database run the command ```php artisan db:seed``` in the terminal in project root folder.
