USE tariff_calculation;

create table if not exists currency
(
    id            int auto_increment
        primary key,
    currency         char(3)       not null,
    profit_margin double(10, 2) not null,
    constraint currency_currency_uindex
        unique (currency)
);

create table if not exists current_exchange
(
    id      int auto_increment
        primary key,
    value   double(10, 2) not null,
    currency    char(3)       not null,
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

create table room_currency
(
    id          int auto_increment
        primary key,
    currency_id int           not null,
    room_id     int           not null,
    price       double(10, 2) not null,
    hotel_id    int           not null,
    constraint room_currency_currency_id_fk
        foreign key (currency_id) references currency (id)
            on update cascade on delete cascade,
    constraint room_currency_hotel_id_fk
        foreign key (hotel_id) references hotel (id)
            on update cascade on delete cascade,
    constraint room_currency_room_id_fk
        foreign key (room_id) references room (id)
            on update cascade on delete cascade
);

create table if not exists seller
(
    id            int auto_increment
        primary key,
    name          varchar(255)  not null,
    profit_margin double(10, 2) not null,
    constraint currency_currency_uindex
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
    currency_base_id       int           not null,
    currency_conversion_id int           not null,
    constraint booking___fks
        foreign key (seller_id) references seller (id),
    constraint booking_currency_id_fk
        foreign key (currency_base_id) references currency (id),
    constraint booking_currency_id_fk_2
        foreign key (currency_conversion_id) references currency (id),
    constraint booking_hotel_id_fk
        foreign key (hotel_id) references hotel (id),
    constraint booking_room_id_fk
        foreign key (room_id) references room (id),
    constraint booking_user_id_fk
        foreign key (user_id) references user (id)
);

