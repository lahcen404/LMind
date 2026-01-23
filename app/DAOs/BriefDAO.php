<?php

namespace app\DAOs;

use config\DBConnection;
use PDO;

class BriefDAO
{
    private static ?BriefDAO $instance = null;

    // get instance
    public static function getInstance(): BriefDAO
    {
        if (self::$instance === null) {
            self::$instance = new BriefDAO();
        }
        return self::$instance;
    }

    private function __construct() {}

    // get all briiefs
    public function getAll(): array
    {
        $db = DBConnection::getInstance()->connectDB();
        $sql = "SELECT b.*, s.name as sprint_name 
                FROM briefs b 
                LEFT JOIN sprints s ON b.sprint_id = s.id 
                ORDER BY b.id DESC";
        return $db->query($sql)->fetchAll();
    }

    // find brief by id
    public function findById(int $id): ?array
    {
        $db = DBConnection::getInstance()->connectDB();
        $sql = "SELECT b.*, s.name as sprint_name 
                FROM briefs b 
                LEFT JOIN sprints s ON b.sprint_id = s.id 
                WHERE b.id = :id";
        $stmt = $db->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch();
        return $result ?: null;
    }

    // get unassigned briefs
    public function getUnassigned(): array
    {
        $db = DBConnection::getInstance()->connectDB();
        $sql = "SELECT * FROM briefs WHERE sprint_id IS NULL ORDER BY title ASC";
        return $db->query($sql)->fetchAll();
    }

    // find by sprint id
    public function findBySprintId(int $sprintId): array
    {
        $db = DBConnection::getInstance()->connectDB();
        $sql = "SELECT * FROM briefs WHERE sprint_id = :sprintId ORDER BY title ASC";
        $stmt = $db->prepare($sql);
        $stmt->execute(['sprintId' => $sprintId]);
        return $stmt->fetchAll();
    }

    // create briiief
    public function create(array $data): bool
    {
        $db = DBConnection::getInstance()->connectDB();
        $sql = "INSERT INTO briefs (title, description, duration, type, sprint_id) 
                VALUES (:title, :description, :duration, :type, :sprint_id)";
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            'title'       => $data['title'],
            'description' => $data['description'],
            'duration'    => $data['duration'],
            'type'        => $data['type'],
            'sprint_id'   => $data['sprint_id'] ?? null
        ]);
    }

    // update brief
    public function update(int $id, array $data): bool
    {
        $db = DBConnection::getInstance()->connectDB();
        $sql = "UPDATE briefs SET 
                title = :title, 
                description = :description, 
                duration = :duration, 
                type = :type, 
                sprint_id = :sprint_id 
                WHERE id = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            'id'          => $id,
            'title'       => $data['title'],
            'description' => $data['description'],
            'duration'    => $data['duration'],
            'type'        => $data['type'],
            'sprint_id'   => $data['sprint_id'] ?? null
        ]);
    }

    // update sprint id
    public function updateSprintId(int $briefId, ?int $sprintId): bool
    {
        $db = DBConnection::getInstance()->connectDB();
        $sql = "UPDATE briefs SET sprint_id = :sprintId WHERE id = :briefId";
        $stmt = $db->prepare($sql);
        return $stmt->execute([
            'sprintId' => $sprintId,
            'briefId'  => $briefId
        ]);
    }

    // delete brief
    public function delete(int $id): bool
    {
        $db = DBConnection::getInstance()->connectDB();
        $sql = "DELETE FROM briefs WHERE id = :id";
        $stmt = $db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    // sync skills
    public function syncSkills(int $briefId, array $skillIds): bool
    {
        $db = DBConnection::getInstance()->connectDB();
        
        try {
            $db->beginTransaction();

            $delSql = "DELETE FROM brief_skills WHERE brief_id = :briefId";
            $delStmt = $db->prepare($delSql);
            $delStmt->execute(['briefId' => $briefId]);

            if (!empty($skillIds)) {
                $insSql = "INSERT INTO brief_skills (brief_id, skill_id) VALUES (:briefId, :skillId)";
                $insStmt = $db->prepare($insSql);
                foreach ($skillIds as $skillId) {
                    $insStmt->execute([
                        'briefId' => $briefId,
                        'skillId' => (int)$skillId
                    ]);
                }
            }

            $db->commit();
            return true;
        } catch (\Exception $e) {
            $db->rollBack();
            return false;
        }
    }

    // get skill ids
    public function getSkillIds(int $briefId): array
    {
        $db = DBConnection::getInstance()->connectDB();
        $sql = "SELECT skill_id FROM brief_skills WHERE brief_id = :briefId";
        $stmt = $db->prepare($sql);
        $stmt->execute(['briefId' => $briefId]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}