<?php
class HeroMapper {
    public function mapToObject(array $data): Hero {
        
        
        return new Hero(
            
            $data['id'],
            $data['nom'],
            $data['hp'],
            $data['attaque'],
            $data['max_hp'],
            $data['img'],
        );
    }
}