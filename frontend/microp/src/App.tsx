import "./App.css";

//router imports
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";

//components imports
import { Header } from "./components/app-header";
import { MainPage } from "./pages/main-page";
import { StreamPage } from "./pages/stream-page";

function App() {
  return (
    <Router>
      <Header />
      <Routes>
        <Route path="/" element={<MainPage />} />
        <Route path="/streams" element={<StreamPage />} />
      </Routes>
    </Router>
  );
}

export default App;
