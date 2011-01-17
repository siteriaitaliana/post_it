CREATE TABLE category (id BIGINT AUTO_INCREMENT, name VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE post (id BIGINT AUTO_INCREMENT, content VARCHAR(255) NOT NULL, user_id INT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE post_category (post_id BIGINT, category_id BIGINT, PRIMARY KEY(post_id, category_id)) ENGINE = INNODB;
CREATE TABLE user (id INT AUTO_INCREMENT, name VARCHAR(20) NOT NULL, surname VARCHAR(20) NOT NULL, username VARCHAR(20) NOT NULL UNIQUE, password VARCHAR(40) NOT NULL, email VARCHAR(40) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE post ADD CONSTRAINT post_user_id_user_id FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE;
ALTER TABLE post_category ADD CONSTRAINT post_category_post_id_post_id FOREIGN KEY (post_id) REFERENCES post(id) ON DELETE CASCADE;
ALTER TABLE post_category ADD CONSTRAINT post_category_category_id_category_id FOREIGN KEY (category_id) REFERENCES category(id) ON DELETE CASCADE;
