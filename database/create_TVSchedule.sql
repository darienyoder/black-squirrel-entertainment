CREATE TABLE TVSchedule (
    id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    day ENUM("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday") NOT NULL,
    hour int NOT NULL,
    minute int NOT NULL,
    show_name varchar(99),
    episode 
    duration int
);
