SET FOREIGN_KEY_CHECKS = 0;
delete from youth;
SET FOREIGN_KEY_CHECKS = 1;

/*
-- ethnicities: 1-10
-- genders: 1-4

-- select * from ethnicities;
1	cd-native
2	cd-asian
3	cd-black
4	cd-hispanic
5	cd-mena
6	cd-islander
7	cd-seAsian
8	cd-white
9	cd-multi
10	cd-decline

*/
insert into youth (active, first_name, last_name, home_phone, email, graduating_class, college_of_interest, career_aspirations,
		food_snacks, date_of_birth, other_ethnicity_text, ethnicities_id, genders_id, guardian_full_name, guardian_phone, guardian_email)
	values 	(0, 'Albert', 'Anderson', '442-222-3322', 'Pgarton@mail.greenriver.edu', 2021, 'UA', 'Doctor', 'Hot Dogs', '2003-02-02', null, 2, 1, 'Cindy Anderson', '253-111-1111', 'cindy@anderson.com'),
			(1, 'Betty', 'Boston', '552-222-3322', 'Dsloan4@mail.greenriver.edu', 2020, 'UB', 'Doctor', 'Ice Cream', '2002-07-02', '', 3, 3, 'Cindy Boston', '253-111-1111', 'cindy@boston.com'),
			(1, 'Chandra', 'Cox', '552-222-3322', 'Emaret2@mail.greenriver.edu', 2021, 'UC', 'Doctor', 'Chips', '2002-07-02', '', 4, 2, 'Cindy Cox', '253-111-1111', 'bill@cox.com'),
			(1, 'Donald', 'Doyle', '552-222-3322', 'Pgarton@mail.greenriver.edu', 2022, 'UD', 'Doctor', 'Fruit', '2002-07-02', '', 5, 1, 'Cindy Doyle', '253-111-1111', 'cindy@doyle.com'),
			(0, 'Elisabeth', 'Ellison', '552-222-3322', 'Dsloan4@mail.greenriver.edu', 2023, 'UE', 'Doctor', 'Soda', '2002-07-02', '', 6, 2, 'Cindy Ellison', '253-111-1111', 'cindy@ecker.com'),
			(1, 'Floyd', 'Franklin', '552-222-3322', 'Emaret2@mail.greenriver.edu', 2020, 'UF', 'Lawyer', 'Carrots', '2002-07-02', '', 7, 1, 'Cindy Franklin', '253-111-1111', 'cindy@franklin.com'),
			(0, 'Gilda', 'Geitner', '552-222-3322', 'Pgarton@mail.greenriver.edu', 2021, 'UG', 'Lawyer',  'Gum', '2002-07-02', '', 8, 2, 'Cindy Geitner', '253-111-1111', 'cindy@geitner.com'),
			(1, 'Harris', 'Hart', '552-222-3322', 'Dsloan4@mail.greenriver.edu', 2022, 'UH', 'Lawyer',  'Candy', '2002-07-02', '', 9, 2, 'Cindy Hart', '253-111-1111', 'cindy@hart.com'),
			(1, 'Imelda', 'Irving', '552-222-3322', 'Emaret2@mail.greenriver.edu', 2023, 'UI', 'Lawyer',  'Ice Cream', '2002-07-02', 'Filipino/Samoan', 10, 3, 'Cindy Irving', '253-111-1111', 'cindy@irving.com'),
			(1, 'Johnny', 'Johnson', '552-222-3322', 'Pgarton@mail.greenriver.edu', 2020, 'UJ', 'Lawyer',  'Cereal', '2002-07-02', '', 11, 1, 'Cindy Johnson', '253-111-1111', 'cindy@johnson.com'),
			(0, 'Keisha', 'King', '552-222-3322', 'Dsloan4@mail.greenriver.edu', 2021, 'UK', 'Lawyer',  'Chips', '2002-07-02', '', 8, 3, 'Bill King', '253-111-1111', 'bill@king.com'),
			(1, 'Lawrence', 'Lawson', '552-222-3322', 'Emaret2@mail.greenriver.edu', 2022, 'UL', 'Lawyer',  'Fruit', '2002-07-02', '', 7, 1, 'Bill Lawson', '253-111-1111', 'bill@lawson.com'),
			(1, 'Mary', 'Matthews', '552-222-3322', 'Pgarton@mail.greenriver.edu', 2023, 'UM', 'Police Chief',  'Jello', '2002-07-02', '', 6, 2, 'Bill Matthews', '253-111-1111', 'bill@matthews.com'),
			(1, 'Norbert', 'Nelson', '552-222-3322', 'Dsloan4@mail.greenriver.edu', 2020, 'UN', 'Police Chief',   'Chips', '2002-07-02', '', 5, 1, 'Bill Nelson', '253-111-1111', 'bill@nelson.com'),
			(0, 'Olivia', 'Olson', '552-222-3322', 'Emaret2@mail.greenriver.edu', 2021, 'UO', 'Police Chief',   'Yogurt', '2002-07-02', '', 4, 2, 'Bill Olson', '253-111-1111', 'bill@olson.com'),
			(1, 'Peter', 'Peterson', '552-222-3322', 'Pgarton@mail.greenriver.edu', 2022, 'UP', 'Police Chief',   'Spinach', '2002-07-02', '', 3, 1, 'Bill Peterson', '253-111-1111', 'bill@perterson.com'),
			(1, 'Queenie', 'Quigley', '552-222-3322', 'Dsloan4@mail.greenriver.edu', 2023, 'UQ', 'Police Chief',   'Popcorn', '2002-07-02', '', 2, 2, 'Bill Quigley', '253-111-1111', 'bill@quigley.com'),
			(1, 'Ronald', 'Robertson', '552-222-3322', 'Emaret2@mail.greenriver.edu', 2021, 'UR', 'Police Chief',   'Candy', '2002-07-02', '', 1, 1, 'Bill Robertson', '253-111-1111', 'bill@robertson.com'),
			(0, 'Sally', 'Sears', '552-222-3322', 'Pgarton@mail.greenriver.edu', 2022, 'US', 'Police Chief',   'Burgers', '2002-07-02', '', 2, 2, 'Bill Sears', '253-111-1111', 'bill@sears.com');


SET FOREIGN_KEY_CHECKS = 0;
SET FOREIGN_KEY_CHECKS = 1;

insert into volunteers values (null, false, 'Alex', 'Anderson', '253-111-1111', 'Emaret2@mail.greenriver.edu', true, '111 Apple St', 'Apt. 1', true, 'Tacoma', 98188, 1, 1, 'Other Role Text', true, 'WA', 1, 1, 1, "Special Skills", 1, "Volunteer exp", 1, "non-Volunteer experience", now(), now());
insert into volunteers values (null, true, 'Betty', 'Benjamin', '253-111-1111', 'Dsloan4@mail.greenriver.edu', false, '111 Apple St', 'Apt. 1', false, 'Tacoma', 98188, 0, 1, 'Other Role Text', true, 'WA', 1, 1, 1, "Special Skills", 1, "Volunteer exp", 1, "non-Volunteer experience", now(), now());
insert into volunteers values (null, false , 'Charlie', 'Cicarello', '253-111-1111', 'Pgarton@mail.greenriver.edu', false, '111 Apple St', 'Apt. 1', true, 'Tacoma', 98188, 1, 1, 'Other Role Text', true, 'WA', 1, 1, 1, "Special Skills", 1, "Volunteer exp", 1, "non-Volunteer experience", now(), now());
insert into volunteers values (null, true, 'Doris', 'Davis', '253-111-1111', 'Emaret2@mail.greenriver.edu', true, '111 Apple St', 'Apt. 1', false, 'Tacoma', 98188, 0, 0, 'Other Role Text', true, 'WA', 1, 1, 0, null, 0, null, 0, null, now(), now());
insert into volunteers values (null, false , 'Edward', 'Edwards', '253-111-1111', 'Dsloan4@mail.greenriver.edu', true, '111 Apple St', 'Apt. 1', true, 'Tacoma', 98188, 1, 0, 'Other Role Text', true, 'WA', 1, 1, 0, null, 0, null, 0, null, now(), now());
insert into volunteers values (null, true, 'Fran', 'Francis', '253-111-1111', 'Pgarton@mail.greenriver.edum', false, '111 Apple St', 'Apt. 1', false, 'Tacoma', 98188, 0, 0, 'Other Role Text', true, 'WA', 1, 1, 0, null, 0, null, 0, null, now(), now());
insert into volunteers values (null, false , 'Grant', 'Griggs', '253-111-1111', 'Emaret2@mail.greenriver.edu', false, '111 Apple St', 'Apt. 1', true, 'Tacoma', 98188, 1, 1, 'Other Role Text', true, 'WA', 1, 1, 0, null, 0, null, 0, null, now(), now());
insert into volunteers values (null, true, 'Helen', 'Hopewell', '253-111-1111', 'Dsloan4@mail.greenriver.edu', true, '111 Apple St', 'Apt. 1', false, 'Tacoma', 98188, 0, 1, 'Other Role Text', true, 'WA', 1, 1, 0, null, 0, null, 0, null, now(), now());
insert into volunteers values (null, false , 'Igor', 'Ignatowski', '253-111-1111', 'Pgarton@mail.greenriver.edum', false, '111 Apple St', 'Apt. 1', true, 'Tacoma', 98188, 1, 0, 'Other Role Text', true, 'WA', 1, 1, 0, null, 0, null, 0, null, now(), now());
insert into volunteers values (null, true, 'Janet', 'Jackson', '253-111-1111', 'Emaret2@mail.greenriver.edu', true, '111 Apple St', 'Apt. 1', false, 'Tacoma', 98188, 0, 0, 'Other Role Text', true, 'WA', 1, 1, 0, null, 0, null, 0, null, now(), now());
insert into volunteers values (null, false , 'Kyle', 'King', '253-111-1111', 'Dsloan4@mail.greenriver.edu', false, '111 Apple St', 'Apt. 1', true, 'Tacoma', 98188, 1, 1, 'Other Role Text', true, 'WA', 1, 1, 0, null, 0, null, 0, null, now(), now());
insert into volunteers values (null, true, 'Lina', 'Lazurus', '253-111-1111', 'Pgarton@mail.greenriver.edu', true, '111 Apple St', 'Apt. 1', false, 'Tacoma', 98188, 0, 0, 'Other Role Text', true, 'WA', 1, 1, 0, null, 0, null, 0, null, now(), now());

insert into volunteer_references values (null, 1, true, 'Alice Anderson', '253-111-1111', 'alice', 'Friend', now(), now());
insert into volunteer_references values (null, 1, true, 'Bruno Boston', '253-111-1111', 'bruno', 'Friend', now(), now());
insert into volunteer_references values (null, 1, true, 'Cicci Ciccone', '253-111-1111', 'cicci', 'Friend', now(), now());
insert into volunteer_references values (null, 2, true, 'Darren Darby', '253-111-1111', 'darren', 'Friend', now(), now());
insert into volunteer_references values (null, 2, true, 'Edgar Elfman', '253-111-1111', 'edgar', 'Friend', now(), now());
insert into volunteer_references values (null, 2, true, 'Fran Franklin', '253-111-1111', 'fran', 'Friend', now(), now());
insert into volunteer_references values (null, 3, true, 'Gino Gigantus', '253-111-1111', 'gino', 'Friend', now(), now());
insert into volunteer_references values (null, 3, true, 'Henrietta Hanson', '253-111-1111', 'henrietta', 'Friend', now(), now());
insert into volunteer_references values (null, 3, true, 'Iggy Ikeman', '253-111-1111', 'iggy', 'Friend', now(), now());
insert into volunteer_references values (null, 3, true, 'Janice Jenner', '253-111-1111', 'janice', 'Friend', now(), now());
insert into volunteer_references values (null, 4, true, 'Alice Anderson', '253-111-1111', 'alice', 'Friend', now(), now());
insert into volunteer_references values (null, 4, true, 'Bruno Boston', '253-111-1111', 'bruno', 'Friend', now(), now());
insert into volunteer_references values (null, 4, true, 'Cicci Ciccone', '253-111-1111', 'cicci', 'Friend', now(), now());
insert into volunteer_references values (null, 5, true, 'Darren Darby', '253-111-1111', 'darren', 'Friend', now(), now());
insert into volunteer_references values (null, 5, true, 'Edgar Elfman', '253-111-1111', 'edgar', 'Friend', now(), now());
insert into volunteer_references values (null, 5, true, 'Fran Franklin', '253-111-1111', 'fran', 'Friend', now(), now());
insert into volunteer_references values (null, 6, true, 'Gino Gigantus', '253-111-1111', 'gino', 'Friend', now(), now());
insert into volunteer_references values (null, 6, true, 'Henrietta Hanson', '253-111-1111', 'henrietta', 'Friend', now(), now());
insert into volunteer_references values (null, 6, true, 'Iggy Ikeman', '253-111-1111', 'iggy', 'Friend', now(), now());
insert into volunteer_references values (null, 7, true, 'Alice Anderson', '253-111-1111', 'alice', 'Friend', now(), now());
insert into volunteer_references values (null, 7, true, 'Bruno Boston', '253-111-1111', 'bruno', 'Friend', now(), now());
insert into volunteer_references values (null, 7, true, 'Cicci Ciccone', '253-111-1111', 'cicci', 'Friend', now(), now());
insert into volunteer_references values (null, 8, true, 'Darren Darby', '253-111-1111', 'darren', 'Friend', now(), now());
insert into volunteer_references values (null, 8, true, 'Edgar Elfman', '253-111-1111', 'edgar', 'Friend', now(), now());
insert into volunteer_references values (null, 8, true, 'Fran Franklin', '253-111-1111', 'fran', 'Friend', now(), now());
insert into volunteer_references values (null, 9, true, 'Gino Gigantus', '253-111-1111', 'gino', 'Friend', now(), now());
insert into volunteer_references values (null, 9, true, 'Henrietta Hanson', '253-111-1111', 'henrietta', 'Friend', now(), now());
insert into volunteer_references values (null, 9, true, 'Iggy Ikeman', '253-111-1111', 'iggy', 'Friend', now(), now());
insert into volunteer_references values (null, 10, true, 'Alice Anderson', '253-111-1111', 'alice', 'Friend', now(), now());
insert into volunteer_references values (null, 10, true, 'Bruno Boston', '253-111-1111', 'bruno', 'Friend', now(), now());
insert into volunteer_references values (null, 10, true, 'Cicci Ciccone', '253-111-1111', 'cicci', 'Friend', now(), now());
insert into volunteer_references values (null, 11, true, 'Darren Darby', '253-111-1111', 'darren', 'Friend', now(), now());
insert into volunteer_references values (null, 11, true, 'Edgar Elfman', '253-111-1111', 'edgar', 'Friend', now(), now());
insert into volunteer_references values (null, 11, true, 'Fran Franklin', '253-111-1111', 'fran', 'Friend', now(), now());
insert into volunteer_references values (null, 12, true, 'Gino Gigantus', '253-111-1111', 'gino', 'Friend', now(), now());
insert into volunteer_references values (null, 12, true, 'Henrietta Hanson', '253-111-1111', 'henrietta', 'Friend', now(), now());
insert into volunteer_references values (null, 12, true, 'Iggy Ikeman', '253-111-1111', 'iggy', 'Friend', now(), now());


insert into volunteer_roles values (null, true, 1, 1, now(), now());
insert into volunteer_roles values (null, true, 1, 3, now(), now());
insert into volunteer_roles values (null, true, 1, 5, now(), now());
insert into volunteer_roles values (null, true, 2, 2, now(), now());
insert into volunteer_roles values (null, true, 2, 4, now(), now());
insert into volunteer_roles values (null, true, 2, 6, now(), now());
insert into volunteer_roles values (null, true, 3, 1, now(), now());
insert into volunteer_roles values (null, true, 3, 2, now(), now());
insert into volunteer_roles values (null, true, 3, 3, now(), now());
insert into volunteer_roles values (null, true, 3, 4, now(), now());
insert into volunteer_roles values (null, true, 3, 5, now(), now());

insert into volunteer_roles values (null, true, 4, 1, now(), now());
insert into volunteer_roles values (null, true, 4, 3, now(), now());
insert into volunteer_roles values (null, true, 4, 5, now(), now());
insert into volunteer_roles values (null, true, 5, 2, now(), now());
insert into volunteer_roles values (null, true, 5, 4, now(), now());
insert into volunteer_roles values (null, true, 5, 6, now(), now());
insert into volunteer_roles values (null, true, 6, 1, now(), now());
insert into volunteer_roles values (null, true, 6, 2, now(), now());
insert into volunteer_roles values (null, true, 6, 3, now(), now());
insert into volunteer_roles values (null, true, 7, 4, now(), now());
insert into volunteer_roles values (null, true, 7, 5, now(), now());

insert into volunteer_roles values (null, true, 8, 1, now(), now());
insert into volunteer_roles values (null, true, 8, 3, now(), now());
insert into volunteer_roles values (null, true, 8, 5, now(), now());
insert into volunteer_roles values (null, true, 8, 2, now(), now());
insert into volunteer_roles values (null, true, 9, 4, now(), now());
insert into volunteer_roles values (null, true, 9, 6, now(), now());
insert into volunteer_roles values (null, true, 10, 1, now(), now());
insert into volunteer_roles values (null, true, 10, 2, now(), now());
insert into volunteer_roles values (null, true, 11, 3, now(), now());
insert into volunteer_roles values (null, true, 12, 4, now(), now());
insert into volunteer_roles values (null, true, 12, 5, now(), now());
