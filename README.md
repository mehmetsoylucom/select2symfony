# Symfony 5 with tetranz/select2 demo

This demo is shows how to use 
`tetranz/select2entity-bundle` with add new tag (`allow_add`) 
option. 

## Hierarchy

- Category
    - title
    - slug
    - products (`oneToMany`)
    
- Products 
    - title
    - slug
    - category (`manyToOne` & `cascade persist`)

## Setup

`yarn add @symfony/webpack-encore --dev`

`bin/console asset:dump`

`bin/console do:da:cr`

`bin/console do:mi:mi`


 