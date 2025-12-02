/* function 1: retorna o número de dias que a planta está viva com base em sua data de semeadura */
DELIMITER //

CREATE FUNCTION daysAlive(planted_date DATE IN)
RETURNS INT
DETERMINISTIC
BEGIN
    RETURN DATEDIFF(NOW(), planted_date);
END //

DELIMITER ;

/* trigger 1: exclui todos os subcomentários quando um comentário é deletado */
DELIMITER //

CREATE TRIGGER delete_sub_comments
AFTER DELETE ON comments
FOR EACH ROW
BEGIN
    DELETE FROM comments WHERE parent_comment_id = OLD.id;
END //

DELIMITER ;


/* Procedure de redefinir senha por nome de usuario*/
DELIMITER //
CREATE PROCEDURE proc_redefinirSenha (IN usuario VARCHAR(50), IN novaSenha VARCHAR(50))
BEGIN
    update users set password = novaSenha
    WHERE usuario = username;
END //

DELIMITER ;
