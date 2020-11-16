<x-app-layout>
   <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           レシピ登録
       </h2>
   </x-slot>
	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
			<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
				@if (session('status'))
				<div class="success mt-5 px-4 text-green-900">
					{{ session('status') }}
				</div>
				@endif
				<!-- ページ固有要素 -->
				<div class="mt-5 px-4 py-5">
					<!-- エラー表示 -->
					<form method="post" action="{{ route('store_recipe') }}">
						@csrf
						<div class="mb-4">
							<label for="recipe_name" class="block mb-2">レシピ名</label>
							<input type="text"
								id="recipe_name"
								class="form-input w-full"
								name="name"
								value="{{ old('name') }}"
								placeholder="レシピ名" />
							@if ($errors->has('name'))
							<span class="error mb-4 text-red-900">{{ $errors->first('name') }}</span>
							@endif
						</div>
						<div class="mb-4">
							<label for="recipe_url" class="block mb-2">URL</label>
							<input type="text"
								id="recipe_url"
								class="form-input w-full"
								name="url"
								value="{{ old('url') }}"
								placeholder="https://xxxxx" />
							@if ($errors->has('url'))
							<span class="error mb-4 text-red-900">{{ $errors->first('url') }}</span>
							@endif
						</div>
						<div class="mb-4">
							<label for="recipe_description" class="block mb-2">説明</label>
							<textarea type="text"
								id="recipe_description"
								class="form-input w-full"
								name="description"
								rows="5"
								>{{ old('description') }}</textarea>
							@if ($errors->has('description'))
							<span class="error mb-4 text-red-900">{{ $errors->first('description') }}</span>
							@endif
						</div>

						<div class="mb-4 flex items-center">
							<input type="submit" value="作成" class="bg-blue-500 text-white font-bold py-2 px-4 rounded" />
						</div>
					</form>
				</div>
				<!-- /ページ固有要素 ここまで -->
			</div>
		</div>
	</div>
</x-app-layout>
