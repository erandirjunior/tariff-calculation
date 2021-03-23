USE tariff_calculation;

create table if not exists coin
(
    id            int auto_increment
        primary key,
    money         char(3)       not null,
    profit_margin double(10, 2) not null,
    constraint coin_money_uindex
        unique (money)
);

create table if not exists current_exchange
(
    id      int auto_increment
        primary key,
    value   double(10, 2) not null,
    coin    char(3)       not null,
    created date          not null
);

create table if not exists hotel
(
    id   int auto_increment
        primary key,
    name varchar(255) not null,
    constraint hotel_name_uindex
        unique (name)
);

create table if not exists room
(
    id       int auto_increment
        primary key,
    hotel_id int         not null,
    room     varchar(10) not null,
    constraint room_hotel_id_fk
        foreign key (hotel_id) references hotel (id)
            on update cascade on delete cascade
);

create table if not exists room_coin
(
    id       int auto_increment
    primary key,
    coin_id  int           not null,
    room_id  int           not null,
    price    double(10, 2) not null,
    hotel_id int           not null,
    constraint room_coin_coin_id_fk
    foreign key (coin_id) references tariff_calculation.coin (id)
    on update cascade on delete cascade,
    constraint room_coin_room_id_fk
    foreign key (room_id) references tariff_calculation.room (id)
    on update cascade on delete cascade,
    constraint room_coin_hotel_id_fk
    foreign key (hotel_id) references tariff_calculation.hotel (id)
    on update cascade on delete cascade
);

create table if not exists seller
(
    id            int auto_increment
        primary key,
    name          varchar(255)  not null,
    profit_margin double(10, 2) not null,
    constraint coin_money_uindex
        unique (name)
);

create table if not exists user
(
    id    int auto_increment
        primary key,
    name  varchar(255) not null,
    email varchar(255) not null,
    constraint user_email_uindex
        unique (email)
);

create table if not exists booking
(
    id                 int auto_increment
        primary key,
    user_id            int           not null,
    seller_id          int           not null,
    hotel_id           int           not null,
    room_id            int           not null,
    price              double(10, 2) not null,
    created            date          not null,
    coin_base_id       int           not null,
    coin_conversion_id int           not null,
    constraint booking___fks
        foreign key (seller_id) references seller (id),
    constraint booking_coin_id_fk
        foreign key (coin_base_id) references coin (id),
    constraint booking_coin_id_fk_2
        foreign key (coin_conversion_id) references coin (id),
    constraint booking_hotel_id_fk
        foreign key (hotel_id) references hotel (id),
    constraint booking_room_id_fk
        foreign key (room_id) references room (id),
    constraint booking_user_id_fk
        foreign key (user_id) references user (id)
);

