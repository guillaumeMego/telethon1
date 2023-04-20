/* Table users */
INSERT INTO `users` (`id_user`, `name`, `first_name`, `mail`, `password`, `token`, `is_admin`, `various`, `picture`, `create_at`, `update_at`) 
VALUES (NULL, 'david', 'legrand', 'david.legrand@charente16.fr', '4321', NULL, '0', NULL, 'thepictureduboss.jpg', '2023-04-18 10:23:59', current_timestamp());

INSERT INTO `users` (`id_user`, `name`, `first_name`, `mail`, `password`, `token`, `is_admin`, `various`, `picture`, `create_at`, `update_at`) 
VALUES (NULL, 'guillaume', 'ganne', 'guillaume.ganne@france.fr', '1234', NULL, '1', NULL, NULL, '2023-04-18 10:31:57', current_timestamp());

INSERT INTO `users` (`id_user`, `name`, `first_name`, `mail`, `password`, `token`, `is_admin`, `various`, `picture`, `create_at`, `update_at`) 
VALUES (NULL, 'julien', 'laboisne', 'julien.laboisne@truc.com', 'password', NULL, '1', NULL, NULL, '2023-04-18 10:34:16', current_timestamp());

INSERT INTO `users` (`id_user`, `name`, `first_name`, `mail`, `password`, `token`, `is_admin`, `various`, `picture`, `create_at`, `update_at`) 
VALUES (NULL, 'renaud', 'bernard', 'renaud.bernard@machin.bidule', 'mdp1234', NULL, '1', NULL, 'profil.jpg', '2023-04-18 10:37:13', current_timestamp());


/* Table stands */
INSERT INTO `stands` (`id_stand`, `name`, `place`, `various`, `create_at`, `update_at`) 
VALUES (NULL, 'Auchan 1', 'stand proche de Jeff de Bruges', 'Auchan', '2023-04-18 10:30:12', current_timestamp());


/* Table partnerships */
INSERT INTO `partnerships` (`id_partnership`, `partnership_user`, `create_at`, `update_at`) 
VALUES ('1', 'contributor', current_timestamp(), current_timestamp());
INSERT INTO `partnerships` (`id_partnership`, `partnership_user`, `create_at`, `update_at`) 
VALUES ('2', 'sponsor', current_timestamp(), current_timestamp());
INSERT INTO `partnerships` (`id_partnership`, `partnership_user`, `create_at`, `update_at`) 
VALUES ('3', 'premium', current_timestamp(), current_timestamp());


/* Table partners */
INSERT INTO `partners` (`id_partner`, `responsible_name`, `responsible_first_name`, `mail`, `social_reason`, `phone`, `logo`, `create_at`, `update_at`, `id_partnership`) 
VALUES (NULL, 'michel', 'visage', 'michel.visage@inter.marche', 'marche', '0647632586', NULL, '2023-04-18 11:04:29', current_timestamp(), '1');


/* Table collects */
INSERT INTO `collects` (`id_collect`, `collect_money`, `date_collect`, `create_at`, `update_at`, `id_partner`, `id_stand`) 
VALUES (NULL, '3284.87', '2023-04-11 11:06:35', '2023-04-18 11:06:35', current_timestamp(), '1', '1');