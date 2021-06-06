drop table comments;

create table comments(
  id INT auto_increment PRIMARY KEY, 
  name VARCHAR(256),
  content TEXT,
  parent_id INT,
  favorites_count INT DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);