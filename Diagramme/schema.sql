CREATE TABLE users (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('READER', 'AUTHOR', 'ADMIN') DEFAULT 'READER' NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE articles (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    author_id BIGINT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    -- This constraint ensures that every article belongs to a valid author, and when the author is deleted, all his articles are deleted automatically.
    CONSTRAINT fk_article_author
        FOREIGN KEY (author_id) REFERENCES users(id)
        ON DELETE CASCADE
);
CREATE TABLE categories (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    description TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE article_category (
    article_id BIGINT NOT NULL,
    category_id BIGINT NOT NULL,

    PRIMARY KEY (article_id, category_id),

    CONSTRAINT fk_ac_article
        FOREIGN KEY (article_id) REFERENCES articles(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_ac_category
        FOREIGN KEY (category_id) REFERENCES categories(id)
        ON DELETE CASCADE
);
CREATE TABLE comments (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    article_id BIGINT NOT NULL,
    user_id BIGINT NOT NULL,
    content TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    -- This constraint ensures that every article belongs to a valid author, and when the author is deleted, all his articles are deleted automatically.
    CONSTRAINT fk_comment_article
        FOREIGN KEY (article_id) REFERENCES articles(id)
        ON DELETE CASCADE,
--    This constraint ensures that every article belongs to a valid author, and when the author is deleted, all his articles are deleted automatically.
    CONSTRAINT fk_comment_user
        FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE
);
CREATE TABLE likes (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT NOT NULL,
    article_id BIGINT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_like_user
        FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE,

    CONSTRAINT fk_like_article
        FOREIGN KEY (article_id) REFERENCES articles(id)
        ON DELETE CASCADE,

    CONSTRAINT unique_like UNIQUE (user_id, article_id)
);
