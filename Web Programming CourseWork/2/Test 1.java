// Generated by Selenium IDE
import org.junit.Test;
import org.junit.Before;
import org.junit.After;
import static org.junit.Assert.*;
import static org.hamcrest.CoreMatchers.is;
import static org.hamcrest.core.IsNot.not;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.remote.RemoteWebDriver;
import org.openqa.selenium.remote.DesiredCapabilities;
import org.openqa.selenium.Dimension;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.interactions.Actions;
import org.openqa.selenium.support.ui.ExpectedConditions;
import org.openqa.selenium.support.ui.WebDriverWait;
import org.openqa.selenium.JavascriptExecutor;
import org.openqa.selenium.Alert;
import org.openqa.selenium.Keys;
import java.util.*;
import java.net.MalformedURLException;
import java.net.URL;
public class FlowTest {
  private WebDriver driver;
  private Map<String, Object> vars;
  JavascriptExecutor js;
  @Before
  public void setUp() {
    driver = new ChromeDriver();
    js = (JavascriptExecutor) driver;
    vars = new HashMap<String, Object>();
  }
  @After
  public void tearDown() {
    driver.quit();
  }
  public String waitForWindow(int timeout) {
    try {
      Thread.sleep(timeout);
    } catch (InterruptedException e) {
      e.printStackTrace();
    }
    Set<String> whNow = driver.getWindowHandles();
    Set<String> whThen = (Set<String>) vars.get("window_handles");
    if (whNow.size() > whThen.size()) {
      whNow.removeAll(whThen);
    }
    return whNow.iterator().next();
  }
  @Test
  public void flow() {
    driver.get("http://localhost/Assign%203/authenticate.php");
    driver.manage().window().setSize(new Dimension(1550, 878));
    driver.findElement(By.linkText("Signup")).click();
    driver.findElement(By.name("username")).click();
    driver.findElement(By.name("username")).sendKeys("root");
    driver.findElement(By.name("email")).sendKeys("root@utd.edu");
    driver.findElement(By.name("password_1")).sendKeys("root");
    driver.findElement(By.name("password_2")).sendKeys("root");
    driver.findElement(By.name("semester")).sendKeys("fall 2018");
    driver.findElement(By.id("track")).click();
    {
      WebElement dropdown = driver.findElement(By.id("track"));
      dropdown.findElement(By.xpath("//option[. = 'Traditional CS']")).click();
    }
    driver.findElement(By.id("track")).click();
    driver.findElement(By.name("reg_user")).click();
    driver.findElement(By.name("userName")).click();
    driver.findElement(By.name("userName")).sendKeys("root");
    driver.findElement(By.name("password")).sendKeys("root");
    driver.findElement(By.name("submit")).click();
    vars.put("window_handles", driver.getWindowHandles());
    driver.findElement(By.linkText("Profile")).click();
    vars.put("win8500", waitForWindow(2000));
    vars.put("root", driver.getWindowHandle());
    driver.switchTo().window(vars.get("win8500").toString());
    driver.close();
    driver.switchTo().window(vars.get("root").toString());
    driver.findElement(By.cssSelector("#\\\'cs5301\\\' > p:nth-child(2) > b")).click();
    driver.findElement(By.cssSelector("#cs5301 .w3-button")).click();
    driver.findElement(By.cssSelector("#\\\'cs5302\\\' > p:nth-child(2)")).click();
    driver.findElement(By.cssSelector("#cs5302 .w3-button")).click();
    driver.findElement(By.cssSelector("#\\\'cs6320\\\' > p:nth-child(2)")).click();
    driver.findElement(By.cssSelector("#cs6320 .w3-button")).click();
    driver.findElement(By.linkText("graddegreeplans@utdallas.edu")).click();
    driver.findElement(By.id("search")).click();
    driver.findElement(By.id("search")).sendKeys("cs63");
    vars.put("window_handles", driver.getWindowHandles());
    driver.findElement(By.linkText("CS 6321")).click();
    vars.put("win693", waitForWindow(2000));
    driver.switchTo().window(vars.get("win693").toString());
    driver.close();
    driver.switchTo().window(vars.get("root").toString());
    driver.findElement(By.id("search")).click();
    driver.findElement(By.id("search")).click();
    {
      WebElement element = driver.findElement(By.id("search"));
      Actions builder = new Actions(driver);
      builder.doubleClick(element).perform();
    }
    driver.findElement(By.id("search")).click();
    driver.findElement(By.name("namestud")).click();
    driver.findElement(By.name("namestud")).sendKeys("root");
    driver.findElement(By.name("semadmit")).click();
    driver.findElement(By.name("semadmit")).sendKeys("fall 2018");
    driver.findElement(By.name("antgrad")).click();
    driver.findElement(By.name("antgrad")).sendKeys("may 2021");
    driver.findElement(By.name("antgrad")).sendKeys("may 2020");
    driver.findElement(By.name("core5")).click();
    driver.findElement(By.name("elec1")).click();
    {
      WebElement dropdown = driver.findElement(By.name("elec1"));
      dropdown.findElement(By.xpath("//option[. = 'CS6325 - Introduction to Bioinformatics']")).click();
    }
    driver.findElement(By.name("elec1")).click();
    driver.findElement(By.name("elec2")).click();
    {
      WebElement dropdown = driver.findElement(By.name("elec2"));
      dropdown.findElement(By.xpath("//option[. = 'CS6307 - Introduction to Big Data Management and Analytics']")).click();
    }
    driver.findElement(By.name("elec2")).click();
    driver.findElement(By.name("elec4")).click();
    {
      WebElement dropdown = driver.findElement(By.name("elec4"));
      dropdown.findElement(By.xpath("//option[. = 'CS6313 - Statistical Methods for Data Science']")).click();
    }
    driver.findElement(By.name("elec4")).click();
    driver.findElement(By.name("elec5")).click();
    {
      WebElement dropdown = driver.findElement(By.name("elec5"));
      dropdown.findElement(By.xpath("//option[. = 'CS6331 - Multimedia Systems']")).click();
    }
    driver.findElement(By.name("elec5")).click();
    driver.findElement(By.name("prereq6")).click();
    driver.findElement(By.name("prereq5")).click();
    driver.findElement(By.name("prereq4")).click();
    driver.findElement(By.name("prereq3")).click();
    driver.findElement(By.name("prereq2")).click();
    driver.findElement(By.name("prereq1")).click();
    driver.findElement(By.name("submit")).click();
    vars.put("window_handles", driver.getWindowHandles());
    driver.findElement(By.linkText("Case1 root 2020-04-06 06:03:24am")).click();
    vars.put("win6168", waitForWindow(2000));
    driver.switchTo().window(vars.get("win6168").toString());
    driver.findElement(By.name("row4grade")).click();
    driver.findElement(By.name("row4grade")).sendKeys("B+");
    driver.findElement(By.name("row8sem")).click();
    driver.findElement(By.name("row8sem")).sendKeys("4");
    driver.findElement(By.name("row14sem")).click();
    driver.findElement(By.name("row14sem")).sendKeys("2");
    driver.findElement(By.name("update")).click();
    driver.findElement(By.id("DbD")).click();
    driver.findElement(By.name("update")).click();
    driver.close();
    driver.switchTo().window(vars.get("root").toString());
    driver.findElement(By.cssSelector("div:nth-child(8) tr:nth-child(3) > td:nth-child(4) > input")).click();
    driver.findElement(By.cssSelector("div:nth-child(8) tr:nth-child(3) > td:nth-child(4) > input")).sendKeys("kfl");
    driver.findElement(By.cssSelector("div:nth-child(8) tr:nth-child(3) > td:nth-child(5) > input")).click();
    driver.findElement(By.cssSelector("div:nth-child(8) tr:nth-child(3) > td:nth-child(5) > input")).sendKeys("2");
    driver.findElement(By.cssSelector("tr:nth-child(3) > td:nth-child(6) > input")).click();
    driver.findElement(By.cssSelector("tr:nth-child(3) > td:nth-child(6) > input")).sendKeys("4");
    driver.findElement(By.cssSelector("button:nth-child(3)")).click();
    driver.findElement(By.linkText("Logout")).click();
    driver.findElement(By.cssSelector("body")).click();
  }
}
