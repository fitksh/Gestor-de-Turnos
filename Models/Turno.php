<?php

class Turno
{
    private PDO $conn;
    private string $table_name = "turnos";

    public function __construct(PDO $db)
    {
        $this->conn = $db;
    }

    /**
     * Obtiene todos los turnos de un peluquero.
     */
    public function obtenerPorPeluquero(int $idPeluquero): array
    {
        $sql = "
            SELECT
                id,
                fecha_inicio,
                fecha_fin,
                cliente_contacto,
                estado
            FROM {$this->table_name}
            WHERE id_peluquero = :id_peluquero
            ORDER BY fecha_inicio
        ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(':id_peluquero', $idPeluquero, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Devuelve un array de fechas ocupadas
     * para usar en calendario.php.
     */
    public function obtenerOcupados(int $idPeluquero): array
    {
        $sql = "
            SELECT
                fecha_inicio,
                fecha_fin
            FROM {$this->table_name}
            WHERE id_peluquero = :id_peluquero
              AND estado = 'ocupado'
        ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(':id_peluquero', $idPeluquero, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Guarda un nuevo turno en la base de datos.
     * @return bool Retorna true si el turno se guardó correctamente, false en caso contrario.
     */
    public function guardarTurno(
        int $idPeluquero,
        string $fechaInicio,
        string $fechaFin,
        string $contacto
    ): bool {

        $sql = "
            INSERT INTO turnos
            (
                fecha_inicio,
                fecha_fin,
                id_peluquero,
                cliente_contacto,
                estado
            )
            VALUES
            (
                :fecha_inicio,
                :fecha_fin,
                :id_peluquero,
                :cliente_contacto,
                'ocupado'
            )
        ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(':fecha_inicio', $fechaInicio);
        $stmt->bindValue(':fecha_fin', $fechaFin);
        $stmt->bindValue(':id_peluquero', $idPeluquero, PDO::PARAM_INT);
        $stmt->bindValue(':cliente_contacto', $contacto);

        return $stmt->execute();
    }

    /**
     * Verifica si ya existe un turno ocupado para el peluquero en la fecha y hora especificada.
     * @return bool Retorna true si existe un turno ocupado, false en caso contrario.
     */
    public function existeTurno(int $idPeluquero, string $fechaInicio): bool
    {
        $sql = "
            SELECT COUNT(*) FROM {$this->table_name}
            WHERE id_peluquero = :id_peluquero
              AND fecha_inicio = :fecha_inicio
              AND estado = 'ocupado'
        ";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindValue(':id_peluquero', $idPeluquero, PDO::PARAM_INT);
        $stmt->bindValue(':fecha_inicio', $fechaInicio);

        $stmt->execute();

        return $stmt->fetchColumn() > 0;
    }
}