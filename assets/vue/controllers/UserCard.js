import { defineComponent, ref } from 'vue';

export default defineComponent({
    name: 'UserCard',
    props: {
        name: {
            type: String,
            default: null
        },
        age: {
            type: Number,
            default: null
        },
        title: {
            type: String,
            default: null
        },
        image: {
            type: String,
            default: null
        },
        description: {
            type: String,
            default: null
        }
    },
    setup() {
        const isFollowing = ref(false);

        const toggleFollow = () => {
            isFollowing.value = !isFollowing.value;
        };

        return {
            isFollowing,
            toggleFollow
        };
    },
    template: `
        <div class="card text-center shadow-sm">
            <img 
                :src="image" 
                class="card-img-top rounded-circle mx-auto mt-3" 
                :alt="name + ' image'" 
                style="width: 100px; height: 100px; object-fit: cover;"
            />
            <div class="card-body">
                <h5 class="card-title">{{ name + ', ' + age + ' ans'}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ title }}</h6>
                <p class="card-text">{{ description }}</p>
                <button 
                    :class="['btn mt-3', isFollowing ? 'btn-success' : 'btn-primary']" 
                    @click="toggleFollow"
                >
                    {{ isFollowing ? 'Suivi' : 'Suivre' }}
                </button>
            </div>
        </div>
    `
});
