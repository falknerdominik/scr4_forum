-- --------------------------------------------
-- author: Dominik Falkner
-- Basic test data for scr_forum
-- --------------------------------------------

-- --------------------------------------------
-- Add Users
-- --------------------------------------------
INSERT INTO `user` (`username`, `password_hash`)
	VALUES
		('edwardelric','$2y$10$ULrV.DXMLf9rz1rwNDIhKuWsjvIxlJkYp7u7PsCJegui.xsYfUraO'), 
		('theoneandonlyVegeta','$2y$10$hOGm.g8tU64cVaq2iZXnm.MbVjzwvMvRABxdW.JjYKuBLnF7dyt6i'), 
		('L','$2y$10$gHoTfKIy8aQ2YKqBaJVjKe37F4U8JbZJNBKTjoP.41v0rBcH4BWXO'), 
		('lyssop','$2y$10$GmlZLIEN8ny9grs3oZxVq.k6FRQf7c1zQ9cTdb8OdxslaOpXkRS2S'), 
		('kira','$2y$10$kUPIw3CtOjnI/DbeEe6TKeVJMGOFyayxvDg/TUD5jhiHSKavLkM7K'),
		('anonymous','$2y$10$LmOFQ9ynCAU0Cltfde56De/2QHPSZhuwIJELRa0oezxs9dt7mtQ5O'), 
		('onepunchman','$2y$10$cmCxl0.Fz71QDK3hXSeZgeGHLKvn.s1DWJbXtpKwewgQjwJRP3sxy'), 
		('luffy','$2y$10$ZnKow5ZRdAxBuh67xNxDPe.hGYhKMNahTW8bbWJsfXcC8/yrMxkD.'), 
		('goku','$2y$10$gUr.ZPzO9EUXZK9t4Ll.yu36iBlt..NaAGVJ3rTyUI50K448o/Vnm'), 
		('<narutoguy>','$2y$10$q.0.VyPhB300Z.2lKRd5DOUXy7z07oOBk6I6WZ1QR/xK1cZdmGH1S');
		
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
	(STR_TO_DATE('2017-06-12','%Y-%m-%d'), 1, 1, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	(STR_TO_DATE('2017-06-12','%Y-%m-%d'), 1, 2, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	(STR_TO_DATE('2017-06-13','%Y-%m-%d'), 1, 3, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	(STR_TO_DATE('2017-06-13','%Y-%m-%d'), 1, 3, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	(STR_TO_DATE('2017-06-14','%Y-%m-%d'), 1, 8, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	(STR_TO_DATE('2017-06-14','%Y-%m-%d'), 1, 1, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	(STR_TO_DATE('2017-06-14','%Y-%m-%d'), 1, 1, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	(STR_TO_DATE('2017-06-15','%Y-%m-%d'), 1, 7, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	(STR_TO_DATE('2017-06-15','%Y-%m-%d'), 1, 3, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	(STR_TO_DATE('2017-06-15','%Y-%m-%d'), 1, 2, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	
	-- discussion 2
	(STR_TO_DATE('2017-05-12','%Y-%m-%d'), 2, 9, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	(STR_TO_DATE('2017-05-18','%Y-%m-%d'), 2, 6, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	(STR_TO_DATE('2017-05-18','%Y-%m-%d'), 2, 10, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	(STR_TO_DATE('2017-05-19','%Y-%m-%d'), 2, 1, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	(STR_TO_DATE('2017-05-20','%Y-%m-%d'), 2, 9, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	
	-- discussion 3
	(STR_TO_DATE('2017-05-25','%Y-%m-%d'), 3, 2, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."'),
	(STR_TO_DATE('2017-05-25','%Y-%m-%d'), 3, 4, 'Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores."');

