<?php
class CategoryController extends Controller {
    /* ... */
    public function store(Request $request) {
        /*
         * Проверяем данные формы создания категории
         */
        $this->validate($request, [
            'parent_id' => 'integer',
            'name' => 'required|max:100',
            'slug' => 'required|max:100|unique:categories,slug|regex:~^[-_a-z0-9]+$~i',
            'image' => 'mimes:jpeg,jpg,png|max:5000'
        ]);
        /*
         * Проверка пройдена, создаем категорию
         */
        $file = $request->file('image');
        if ($file) { // был загружен файл изображения
            $path = $file->store('catalog/category/source', 'public');
            $base = basename($path);
        }
        $data = $request->all();
        $data['image'] = $base ?? null;
        $category = Category::create($data);
        return redirect()
            ->route('admin.category.show', ['category' => $category->id])
            ->with('success', 'Новая категория успешно создана');
    }
    /* ... */
}
