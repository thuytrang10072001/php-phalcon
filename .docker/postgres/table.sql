CREATE TABLE Customer (
    id SERIAL PRIMARY KEY,
    name varchar(50),
    phone TEXT,
    address varchar(100),
    email varchar(100),
    pass varchar(100)
);

INSERT INTO
    Customer (
        name,
        phone,
        address,
        email,
        pass
    )
VALUES (
        'John Doe',
        '0912341212',
        'New York City',
        'john.doe@example.com',
        '$2y$12$ZP/ZWAQqgO2riNcKsuF9VueAqKoXquVoRiVreng2Ch888l1IpW.aS'
    ),
    (
        'Jane Smith',
        '0912341212',
        'Francisco City',
        'jane.smith@example.com',
        '$2y$12$ZP/ZWAQqgO2riNcKsuF9VueAqKoXquVoRiVreng2Ch888l1IpW.aS'
    ),
    (
        'Anna Kenrick',
        '0912341212',
        'Washington Capital',
        'anna.kenrick@example.com',
        '$2y$12$ZP/ZWAQqgO2riNcKsuF9VueAqKoXquVoRiVreng2Ch888l1IpW.aS'
    ),
    (
        'Taylor Swift',
        '0912341212',
        'Miami State',
        'taylor.swift@example.com',
        '$2y$12$ZP/ZWAQqgO2riNcKsuF9VueAqKoXquVoRiVreng2Ch888l1IpW.aS'
    ),
    (
        'Charlie Puth',
        '0912341212',
        'Boston Celtic State',
        'charlie.puth@example.com',
        '$2y$12$ZP/ZWAQqgO2riNcKsuF9VueAqKoXquVoRiVreng2Ch888l1IpW.aS'
    ),
    (
        'Kim Taeyeon',
        '0912341212',
        'Jeonju',
        'kim.taeyeon@example.com',
        '$2y$12$ZP/ZWAQqgO2riNcKsuF9VueAqKoXquVoRiVreng2Ch888l1IpW.aS'
    ),
    (
        'Im Yoona',
        '0912341212',
        'DaerimDong',
        'im.yoona@example.com',
        '$2y$12$ZP/ZWAQqgO2riNcKsuF9VueAqKoXquVoRiVreng2Ch888l1IpW.aS'
    ),
    (
        'Sunny',
        '0912341212',
        'California',
        'sunny@example.com',
        '$2y$12$ZP/ZWAQqgO2riNcKsuF9VueAqKoXquVoRiVreng2Ch888l1IpW.aS'
    );