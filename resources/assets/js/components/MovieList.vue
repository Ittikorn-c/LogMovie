<template>
  <div class="col-md-8 ml-md-3 my-md-5 box-shadow bg-white rounded align-self-baseline">
    <div class="pt-5">
      <h4 class="font-weight-light">Movies List</h4>
      <div class="filters d-flex flex-column">
        <div class="row border-bottom">
          <a href="#" class="btn-link pr-3" @click.prevent="changeVisible('all')">ALL</a>
          <a href="#" class="btn-link pr-3" @click.prevent="changeVisible('watched')">Watched</a>
          <a href="#" class="btn-link pr-3" @click.prevent="changeVisible('favourite')">Favourite</a>
          <a href="#" class="btn-link pr-3" @click.prevent="changeVisible('meh')">Meh</a>
          <a href="#" class="btn-link pr-3" @click.prevent="changeVisible('planned')">Planned</a>
        </div>
      </div>
    </div>

    <div class="list-box">
      <div class="list-item d-flex justify-content-between py-3 align-items-center"
           v-for="movie in filteredMovies"
           :key="movie.id">
        <div class="d-flex">
          <a href="#" class="thumb">
            <img src='/storage/avatars/default.png' alt="">
          </a>
          <a href="#" class="text-warning d-block">{{movie.name}}</a>
        </div>
        <div class="d-flex">
          <span>reviewed</span>
          <div class="dropdown dropleft">
            <a href="#" class="text-secondary text-ellipsis-twoline" data-toggle="dropdown"><i
                class="fa fa-pen-square"></i></a>
            <div class="dropdown-menu">
              <a class="dropdown-item" @click="changeStatus(movie, 'watched')">Watched</a>
              <a class="dropdown-item" @click="changeStatus(movie, 'favourite')">Favourite</a>
              <a class="dropdown-item" @click="changeStatus(movie, 'meh')">Meh</a>
              <a class="dropdown-item border-bottom" @click="changeStatus(movie, 'planned')">Plan to Watch </a>
              <a class="dropdown-item" @click="removeEntry(movie)">Remove entry</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
    let filters = {
        all: function (movies) {
            return movies;
        },
        watched: function (movies) {
            return movies.filter(function (movie) {
                return movie.status === 'watched';
            })
        },
        favourite: function (movies) {
            return movies.filter(function (movie) {
                return movie.status === 'favourite'
            })
        },
        meh: function (movies) {
            return movies.filter(function (movie) {
                return movie.status === 'meh'
            })
        },
        planned: function (movies) {
            return movies.filter(function (movie) {
                return movie.status === 'planned'
            })
        }
    };

    export default {
        data() {
            return {
                movies: [
                    {id: 1, name: 'watched-movies', status: 'watched'},
                    {id: 2, name: 'planned-movies', status: 'planned'},
                    {id: 3, name: 'fav-movies', status: 'favourite'},
                    {id: 4, name: 'meh', status: 'meh'},
                ],

                visibility: 'all'
            }
        },

        computed: {
            filteredMovies: function () {
                return filters[this.visibility](this.movies);
            },
        },

        methods: {
            changeStatus(movie, status) {
                movie.status = status;
            },

            changeVisible(status) {
                this.visibility = status;
            },

            removeEntry(removeMovie) {
                this.movies = this.movies.filter(movie => {
                    return movie.id !== removeMovie.id;
                })
            }
        },
    }
</script>
