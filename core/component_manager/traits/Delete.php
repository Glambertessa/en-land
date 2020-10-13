<?php

namespace core\component_manager\traits;


trait Delete
{
    /**
     * @param string $slug
     * @param string $path
     * @param string $folder
     * @return bool
     */
    public function delete(string $slug, string $path, string $folder): bool
    {
        $unlink = unlink( ROOT_DIR . $folder .$slug);
        $rmdir = rmdir( ROOT_DIR . $folder . $path);
        return (true ?: $unlink and $rmdir ?: false);
    }
}