create table if not exists movie
(
    id int auto_increment
        primary key,
    title varchar(255) not null,
    duration int not null
)
    engine=InnoDB;

create table if not exists people
(
    id int auto_increment
        primary key,
    firstname varchar(255) not null,
    lastname varchar(255) not null,
    date_of_birth date not null,
    nationality varchar(255) not null
)
    engine=InnoDB;

create table if not exists movie_has_people
(
    Movie_id int not null,
    People_id int not null,
    role varchar(255) not null,
    significance enum('principal', 'secondaire') null,
    primary key (Movie_id, People_id),
    constraint fk_Movie_has_People_Movie1
        foreign key (Movie_id) references movie (id),
    constraint fk_Movie_has_People_People1
        foreign key (People_id) references people (id)
)
    engine=InnoDB;

create index IDX_EDC40D8176E5D4AA
    on movie_has_people (Movie_id);

create index IDX_EDC40D81B3B64B95
    on movie_has_people (People_id);

create table if not exists price
(
    id int auto_increment
        primary key,
    type_name varchar(255) not null,
    value double not null,
    current tinyint(1) not null
)
    engine=InnoDB;

create table if not exists room
(
    id int auto_increment
        primary key,
    nb_places int not null
)
    engine=InnoDB;

create table if not exists showing
(
    id int auto_increment
        primary key,
    date datetime not null,
    `3D` tinyint(1) not null,
    Room_id int not null,
    Movie_id int not null,
    constraint fk_Showing_Movie1
        foreign key (Movie_id) references movie (id),
    constraint fk_Showing_Room1
        foreign key (Room_id) references room (id)
)
    engine=InnoDB;

create index IDX_266FA23B54177093
    on showing (Room_id);

create index IDX_266FA23B8F93B6FC
    on showing (Movie_id);

create table if not exists spectator
(
    id int auto_increment
        primary key,
    lastname varchar(255) not null,
    firstname varchar(255) not null,
    age int not null,
    title varchar(255) not null
)
    engine=InnoDB;

create table if not exists type
(
    id int auto_increment
        primary key,
    name varchar(255) not null
)
    engine=InnoDB;

create table if not exists movie_has_type
(
    Movie_id int not null,
    Type_id int not null,
    primary key (Movie_id, Type_id),
    constraint fk_Movie_has_Type_Movie1
        foreign key (Movie_id) references movie (id),
    constraint fk_Movie_has_Type_Type1
        foreign key (Type_id) references type (id)
)
    engine=InnoDB;

create index IDX_D7417FB76E5D4AA
    on movie_has_type (Movie_id);

create index IDX_D7417FBAF1B50F
    on movie_has_type (Type_id);

create table if not exists user
(
    id int auto_increment
        primary key,
    lastname varchar(255) not null,
    firstname varchar(255) not null,
    date_of_birth date not null,
    title varchar(255) not null,
    email varchar(255) not null
)
    engine=InnoDB;

create table if not exists `order`
(
    id int auto_increment
        primary key,
    created_at datetime not null,
    User_id int not null,
    constraint fk_Order_User
        foreign key (User_id) references user (id)
)
    engine=InnoDB;

create index IDX_F5299398A76ED395
    on `order` (User_id);

create table if not exists ticket
(
    id int auto_increment
        primary key,
    Price_id int not null,
    Showing_id int not null,
    Spectator_id int not null,
    user_order_id int not null,
    constraint UNIQ_97A0ADA3523FB688
        unique (Spectator_id),
    constraint FK_97A0ADA36D128938
        foreign key (user_order_id) references `order` (id),
    constraint fk_Ticket_Price1
        foreign key (Price_id) references price (id),
    constraint fk_Ticket_Showing1
        foreign key (Showing_id) references showing (id),
    constraint fk_Ticket_Spectator1
        foreign key (Spectator_id) references spectator (id)
)
    engine=InnoDB;

create index IDX_97A0ADA36D128938
    on ticket (user_order_id);

create index IDX_97A0ADA3D614C7E7
    on ticket (Price_id);

create index IDX_97A0ADA3F436DC5
    on ticket (Showing_id);

create index fk_Ticket_Spectator1_idx
    on ticket (Spectator_id);

