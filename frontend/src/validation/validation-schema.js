import * as yup from 'yup';

export const FoodSchema = yup.object().shape({
  category_id: yup.number().required('Category ID is required').positive().integer(),
  name: yup.string().required('Name is required').min(3, 'Name must be at least 3 characters'),
  image: yup.string().required('Image is required'),
  video_url: yup.string().required('Video URL is required'),
  cooking_time: yup.number().required('Cooking time is required'),
  ingredients: yup.string().required('Ingredients is required'),
});