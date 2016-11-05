use thepiratestore;
/*
** Agregar categorias
*/
insert into categorias(nombre, activo, created_at, updated_at)
  values('Ropa',
    true,
    "12-12-12",
    "12-12-12");
insert into categorias(nombre, activo, created_at, updated_at)
  values('Utencilios',
    true,
    "12-12-12",
    "12-12-12");
insert into categorias(nombre, activo, created_at, updated_at)
  values('Barcos',
    true,
    "12-12-12",
    "12-12-12");

/*
** Agreagar productos
*/
insert into articulos(nombre, descripcion, precio, cantidad, activo, categoria_id, created_at, updated_at)
  values('Parche',
    'Hermoso parche pirate de diferentes colores',
    159.5,
    10,
    true,
    2,
    "12-12-12",
    "12-12-12"
  );

  insert into articulos(nombre, descripcion, precio, cantidad, activo, categoria_id, created_at, updated_at)
    values('Pierna de palo',
      'Pierna de madera de roble para remplazar lo que antes era tu pierna.',
      500.23,
      17,
      true,
      2,
      "12-12-12",
      "12-12-12"
    );

  insert into articulos(nombre, descripcion, precio, cantidad, activo, categoria_id, created_at, updated_at)
    values('Barba',
      'Barba pirata de diferentes colores.',
      54.6,
      8,
      true,
      2,
      "12-12-12",
      "12-12-12"
    );

    insert into articulos(nombre, descripcion, precio, cantidad, activo, categoria_id, created_at, updated_at)
      values('Pantalon pirata',
        'Pantalon pirata marca levis, tallas 28 a 40',
        980.4,
        56,
        1,
        true,
        "12-12-12",
        "12-12-12"
      );

    insert into articulos(nombre, descripcion, precio, cantidad, activo, categoria_id, created_at, updated_at)
      values('Camisa pirata',
        'camisa pirata marca Pavi Italy, tallas 30 a 42',
        159.5,
        10,
        true,
        1,
        "12-12-12",
        "12-12-12"
      );
    insert into articulos(nombre, descripcion, precio, cantidad, activo, categoria_id, created_at, updated_at)
      values('Bucanero',
        'Hermoso barco, en el cual podras cruzar los 7 mares, con capacidad para 15 personas',
        400000,
        3,
        true,
        3,
        "12-12-12",
        "12-12-12"
      );

    insert into articulos(nombre, descripcion, precio, cantidad, activo, categoria_id, created_at, updated_at)
      values('Especial de hallowen',
        'Barco fantasma especial de halloween, capacidad para 200 tripulantes y 120 canones(Los canones se venden por separado)',
        34000234,
        10,
        true,
        3,
        "12-12-12",
        "12-12-12"
      );
    insert into articulos(nombre, descripcion, precio, cantidad, activo, categoria_id, created_at, updated_at)
      values('Panga',
        'Por algo se empieza, en este barco nadie podra darte la contra como capitan ya que solo tiene capacidad para ti.',
        20000,
        10,
        true,
        3,
        "12-12-12",
        "12-12-12"
      );

    insert into articulos(nombre, descripcion, precio, cantidad, activo, categoria_id, created_at, updated_at)
      values('El Holandes errante',
        'Unico en su clase, capacidad de 250 tripulantes y 350 canones(Los canones se venden por separado.)',
        159.5,
        10,
        true,
        3,
        "12-12-12",
        "12-12-12"
      );

insert into links(display, url, show_menu)
  values('Categorias', 'Categoria', 1);

insert into links(display, url, show_menu)
  values('Articulos', 'Articulo', 1);

insert into links(display, url, show_menu)
  values('Imagenes', 'Imagen', 1);
