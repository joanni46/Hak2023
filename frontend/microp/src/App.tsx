import "./App.css";

//router imports
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";

//components imports
import { Header } from "./components/app-header";
import { MainPage } from "./pages/main-page";

function App() {
  return (
    <Router>
      <Header />
      <Routes>
        <Route path="/" element={<MainPage />} />
      </Routes>
    </Router>
  );
}

export default App;
