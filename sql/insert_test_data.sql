-- --------------------------------------------
-- author: Dominik Falkner
-- Basic test data for scr_forum
-- --------------------------------------------

-- --------------------------------------------
-- Add Users
-- --------------------------------------------
INSERT INTO `user` (`username`, `password_hash`)
	VALUES
		('edwardelric','$2y$10$zGWRljy8TJOLu.2HCAAHpO.bGiHBx45zuWmWVN4xN1Dq1YCHMl6tW'), 
		('theoneandonlyVegeta','$2y$10$m1Kjdey1YM88YTc.2KCdXOkgMMQw5mZ5tdb1Ln8osbr1pE9wJS4Ru'), 
		('L','$2y$10$JOo5x/CnOAQBchzI5OyKa.Hq0C0AzmaHDFQNJJuTelzjF07KkOMFm'), 
		('lyssop','$2y$10$eI5juMlBAS4gVaB8eMUE5uPeW2jXK4yPpCBH9qL0CCZotXcelSR9K'), 
		('kira','$2y$10$nQwf3sR44blWBvEJEapzDeAyQLw1ZyZO7eU9cbWVlZhn3oLA0pfgq'), 
		('anonymous','$2y$10$bNc4jTVoYGshW5vedu..L./baF1DwiFcXsQRfzKNkvjxVlrYikpDi'), 
		('onepunchman','$2y$10$oORKMXnFxtnsFnzkni8TwuBmjio0uNMQXuBEQ3AnAjwnzuTVR/n/G'), 
		('luffy','$2y$10$71xL6u71l1/ZcIN8AOCyKOOoy17QqBxgbalhmmJTcAMclXODDIvJG'), 
		('goku','$2y$10$c3VTj6651lILax8lO3DuZOeSQ7fWTpan2hsyAhEjBy0Pw2CCW0YkW');
		
		
-- --------------------------------------------
-- Add Discussions
-- --------------------------------------------
INSERT INTO `discussion` (`name`, `creation_date`, `creator_id`)
	VALUES
		('Dynamic vs. static typed languages',  STR_TO_DATE('2017-06-12', '%Y-%m-%d'), 1),
		('Whats your setup for programming PHP',  STR_TO_DATE('2017-05-12', '%Y-%m-%d'), 9),
		('Anyone using PHPStrom or Atom?', STR_TO_DATE('2017-05-25', '%Y-%m-%d'), 4);

-- --------------------------------------------
-- Add posts
-- --------------------------------------------		
INSERT INTO `post` (`creation_date`, `discussion_id`, `creator_id`, `text`)
	VALUES
	-- discussion 1
	(STR_TO_DATE('2017-06-12','%Y-%m-%d'), 1, 1, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores. Test"'),
	(STR_TO_DATE('2017-06-12','%Y-%m-%d'), 1, 2, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores. Test"'),
	(STR_TO_DATE('2017-06-13','%Y-%m-%d'), 1, 3, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	(STR_TO_DATE('2017-06-13','%Y-%m-%d'), 1, 3, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	(STR_TO_DATE('2017-06-14','%Y-%m-%d'), 1, 8, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	(STR_TO_DATE('2017-06-14','%Y-%m-%d'), 1, 1, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	(STR_TO_DATE('2017-06-14','%Y-%m-%d'), 1, 1, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	(STR_TO_DATE('2017-06-15','%Y-%m-%d'), 1, 7, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	(STR_TO_DATE('2017-06-15','%Y-%m-%d'), 1, 3, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	(STR_TO_DATE('2017-06-15','%Y-%m-%d'), 1, 2, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	
	-- discussion 2
	(STR_TO_DATE('2017-05-12','%Y-%m-%d'), 2, 9, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores. Test"'),
	(STR_TO_DATE('2017-05-18','%Y-%m-%d'), 2, 6, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	(STR_TO_DATE('2017-05-18','%Y-%m-%d'), 2, 4, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	(STR_TO_DATE('2017-05-19','%Y-%m-%d'), 2, 1, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	(STR_TO_DATE('2017-05-20','%Y-%m-%d'), 2, 9, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	
	-- discussion 3
	(STR_TO_DATE('2017-05-25','%Y-%m-%d'), 3, 2, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	(STR_TO_DATE('2017-05-25','%Y-%m-%d'), 3, 4, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."');

