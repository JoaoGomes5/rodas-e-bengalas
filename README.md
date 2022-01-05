### Users
  - Admin
  - Home admin
  - Technician
  - Client 

### Requisitos funcionais

  - **Admin** 
    - As an **admin** i can **create new home** 
    - As an **admin** i can **get statistics**
      - **number of client per home**
      - **most used medication**
      - **users taking more SOS medications**

  - **Home admin**
    - As an **home admin** i can **import data from a csv file**
      - **clients**
      - **technicians**
      - **medicines**
    - As an **home admin** i can **manage clients** (CRUD)
    - As an **home admin** i can **manage technicians** (CRUD)
    - As an **home admin** i can **manage medicines** (CRUD)
  
  - **Technician** 
    - As an **technician** i can **consult client medicines stocks**
    - As an **technician** i can **consult stocks in the home where i work**
    - As an **technician** i can **manage medications plan** (CRUD)
      - **they must be validated in order to update stocks correctly**

  - **Client**
    - As an **client** i can see **my medications plan**
  
### Requesitos não funcionais
  - Use Javascript
  - Use HTML
  - Use CSS
  - Use PHP
