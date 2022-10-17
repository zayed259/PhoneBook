<!-- Card Body -->
<div class="card-body pb-0">
    <form class="navbar-search" id="searchform" name="searchform">
        @csrf
        <div class="row justify-content-between">
            <div class="input-group col-md-6 mb-3">
                <input type="text" autocomplete="off" class="form-control bg-light border-0 small" placeholder="Search by name, email or phone" id="search" name="search">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
            <div class="input-group col-md-4 mb-3">
                <span class="input-group-text bg-primary text-white" id="filterby-addon">Filter By</span>
                <select id="filter" name="filter" class="form-select" aria-label="filter-addon" aria-describedby="filterby-addon">
                    <option value="">All</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                    <option value="F">F</option>
                    <option value="G">G</option>
                    <option value="H">H</option>
                    <option value="I">I</option>
                    <option value="J">J</option>
                    <option value="K">K</option>
                    <option value="L">L</option>
                    <option value="M">M</option>
                    <option value="N">N</option>
                    <option value="O">O</option>
                    <option value="P">P</option>
                    <option value="Q">Q</option>
                    <option value="R">R</option>
                    <option value="S">S</option>
                    <option value="T">T</option>
                    <option value="U">U</option>
                    <option value="V">V</option>
                    <option value="W">W</option>
                    <option value="X">X</option>
                    <option value="Y">Y</option>
                    <option value="Z">Z</option>
                </select>
            </div>
        </div>
    </form>
</div>