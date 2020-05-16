/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/@babel/runtime/regenerator/index.js":
/*!**********************************************************!*\
  !*** ./node_modules/@babel/runtime/regenerator/index.js ***!
  \**********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! regenerator-runtime */ "./node_modules/regenerator-runtime/runtime.js");


/***/ }),

/***/ "./node_modules/regenerator-runtime/runtime.js":
/*!*****************************************************!*\
  !*** ./node_modules/regenerator-runtime/runtime.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/**
 * Copyright (c) 2014-present, Facebook, Inc.
 *
 * This source code is licensed under the MIT license found in the
 * LICENSE file in the root directory of this source tree.
 */

var runtime = (function (exports) {
  "use strict";

  var Op = Object.prototype;
  var hasOwn = Op.hasOwnProperty;
  var undefined; // More compressible than void 0.
  var $Symbol = typeof Symbol === "function" ? Symbol : {};
  var iteratorSymbol = $Symbol.iterator || "@@iterator";
  var asyncIteratorSymbol = $Symbol.asyncIterator || "@@asyncIterator";
  var toStringTagSymbol = $Symbol.toStringTag || "@@toStringTag";

  function wrap(innerFn, outerFn, self, tryLocsList) {
    // If outerFn provided and outerFn.prototype is a Generator, then outerFn.prototype instanceof Generator.
    var protoGenerator = outerFn && outerFn.prototype instanceof Generator ? outerFn : Generator;
    var generator = Object.create(protoGenerator.prototype);
    var context = new Context(tryLocsList || []);

    // The ._invoke method unifies the implementations of the .next,
    // .throw, and .return methods.
    generator._invoke = makeInvokeMethod(innerFn, self, context);

    return generator;
  }
  exports.wrap = wrap;

  // Try/catch helper to minimize deoptimizations. Returns a completion
  // record like context.tryEntries[i].completion. This interface could
  // have been (and was previously) designed to take a closure to be
  // invoked without arguments, but in all the cases we care about we
  // already have an existing method we want to call, so there's no need
  // to create a new function object. We can even get away with assuming
  // the method takes exactly one argument, since that happens to be true
  // in every case, so we don't have to touch the arguments object. The
  // only additional allocation required is the completion record, which
  // has a stable shape and so hopefully should be cheap to allocate.
  function tryCatch(fn, obj, arg) {
    try {
      return { type: "normal", arg: fn.call(obj, arg) };
    } catch (err) {
      return { type: "throw", arg: err };
    }
  }

  var GenStateSuspendedStart = "suspendedStart";
  var GenStateSuspendedYield = "suspendedYield";
  var GenStateExecuting = "executing";
  var GenStateCompleted = "completed";

  // Returning this object from the innerFn has the same effect as
  // breaking out of the dispatch switch statement.
  var ContinueSentinel = {};

  // Dummy constructor functions that we use as the .constructor and
  // .constructor.prototype properties for functions that return Generator
  // objects. For full spec compliance, you may wish to configure your
  // minifier not to mangle the names of these two functions.
  function Generator() {}
  function GeneratorFunction() {}
  function GeneratorFunctionPrototype() {}

  // This is a polyfill for %IteratorPrototype% for environments that
  // don't natively support it.
  var IteratorPrototype = {};
  IteratorPrototype[iteratorSymbol] = function () {
    return this;
  };

  var getProto = Object.getPrototypeOf;
  var NativeIteratorPrototype = getProto && getProto(getProto(values([])));
  if (NativeIteratorPrototype &&
      NativeIteratorPrototype !== Op &&
      hasOwn.call(NativeIteratorPrototype, iteratorSymbol)) {
    // This environment has a native %IteratorPrototype%; use it instead
    // of the polyfill.
    IteratorPrototype = NativeIteratorPrototype;
  }

  var Gp = GeneratorFunctionPrototype.prototype =
    Generator.prototype = Object.create(IteratorPrototype);
  GeneratorFunction.prototype = Gp.constructor = GeneratorFunctionPrototype;
  GeneratorFunctionPrototype.constructor = GeneratorFunction;
  GeneratorFunctionPrototype[toStringTagSymbol] =
    GeneratorFunction.displayName = "GeneratorFunction";

  // Helper for defining the .next, .throw, and .return methods of the
  // Iterator interface in terms of a single ._invoke method.
  function defineIteratorMethods(prototype) {
    ["next", "throw", "return"].forEach(function(method) {
      prototype[method] = function(arg) {
        return this._invoke(method, arg);
      };
    });
  }

  exports.isGeneratorFunction = function(genFun) {
    var ctor = typeof genFun === "function" && genFun.constructor;
    return ctor
      ? ctor === GeneratorFunction ||
        // For the native GeneratorFunction constructor, the best we can
        // do is to check its .name property.
        (ctor.displayName || ctor.name) === "GeneratorFunction"
      : false;
  };

  exports.mark = function(genFun) {
    if (Object.setPrototypeOf) {
      Object.setPrototypeOf(genFun, GeneratorFunctionPrototype);
    } else {
      genFun.__proto__ = GeneratorFunctionPrototype;
      if (!(toStringTagSymbol in genFun)) {
        genFun[toStringTagSymbol] = "GeneratorFunction";
      }
    }
    genFun.prototype = Object.create(Gp);
    return genFun;
  };

  // Within the body of any async function, `await x` is transformed to
  // `yield regeneratorRuntime.awrap(x)`, so that the runtime can test
  // `hasOwn.call(value, "__await")` to determine if the yielded value is
  // meant to be awaited.
  exports.awrap = function(arg) {
    return { __await: arg };
  };

  function AsyncIterator(generator) {
    function invoke(method, arg, resolve, reject) {
      var record = tryCatch(generator[method], generator, arg);
      if (record.type === "throw") {
        reject(record.arg);
      } else {
        var result = record.arg;
        var value = result.value;
        if (value &&
            typeof value === "object" &&
            hasOwn.call(value, "__await")) {
          return Promise.resolve(value.__await).then(function(value) {
            invoke("next", value, resolve, reject);
          }, function(err) {
            invoke("throw", err, resolve, reject);
          });
        }

        return Promise.resolve(value).then(function(unwrapped) {
          // When a yielded Promise is resolved, its final value becomes
          // the .value of the Promise<{value,done}> result for the
          // current iteration.
          result.value = unwrapped;
          resolve(result);
        }, function(error) {
          // If a rejected Promise was yielded, throw the rejection back
          // into the async generator function so it can be handled there.
          return invoke("throw", error, resolve, reject);
        });
      }
    }

    var previousPromise;

    function enqueue(method, arg) {
      function callInvokeWithMethodAndArg() {
        return new Promise(function(resolve, reject) {
          invoke(method, arg, resolve, reject);
        });
      }

      return previousPromise =
        // If enqueue has been called before, then we want to wait until
        // all previous Promises have been resolved before calling invoke,
        // so that results are always delivered in the correct order. If
        // enqueue has not been called before, then it is important to
        // call invoke immediately, without waiting on a callback to fire,
        // so that the async generator function has the opportunity to do
        // any necessary setup in a predictable way. This predictability
        // is why the Promise constructor synchronously invokes its
        // executor callback, and why async functions synchronously
        // execute code before the first await. Since we implement simple
        // async functions in terms of async generators, it is especially
        // important to get this right, even though it requires care.
        previousPromise ? previousPromise.then(
          callInvokeWithMethodAndArg,
          // Avoid propagating failures to Promises returned by later
          // invocations of the iterator.
          callInvokeWithMethodAndArg
        ) : callInvokeWithMethodAndArg();
    }

    // Define the unified helper method that is used to implement .next,
    // .throw, and .return (see defineIteratorMethods).
    this._invoke = enqueue;
  }

  defineIteratorMethods(AsyncIterator.prototype);
  AsyncIterator.prototype[asyncIteratorSymbol] = function () {
    return this;
  };
  exports.AsyncIterator = AsyncIterator;

  // Note that simple async functions are implemented on top of
  // AsyncIterator objects; they just return a Promise for the value of
  // the final result produced by the iterator.
  exports.async = function(innerFn, outerFn, self, tryLocsList) {
    var iter = new AsyncIterator(
      wrap(innerFn, outerFn, self, tryLocsList)
    );

    return exports.isGeneratorFunction(outerFn)
      ? iter // If outerFn is a generator, return the full iterator.
      : iter.next().then(function(result) {
          return result.done ? result.value : iter.next();
        });
  };

  function makeInvokeMethod(innerFn, self, context) {
    var state = GenStateSuspendedStart;

    return function invoke(method, arg) {
      if (state === GenStateExecuting) {
        throw new Error("Generator is already running");
      }

      if (state === GenStateCompleted) {
        if (method === "throw") {
          throw arg;
        }

        // Be forgiving, per 25.3.3.3.3 of the spec:
        // https://people.mozilla.org/~jorendorff/es6-draft.html#sec-generatorresume
        return doneResult();
      }

      context.method = method;
      context.arg = arg;

      while (true) {
        var delegate = context.delegate;
        if (delegate) {
          var delegateResult = maybeInvokeDelegate(delegate, context);
          if (delegateResult) {
            if (delegateResult === ContinueSentinel) continue;
            return delegateResult;
          }
        }

        if (context.method === "next") {
          // Setting context._sent for legacy support of Babel's
          // function.sent implementation.
          context.sent = context._sent = context.arg;

        } else if (context.method === "throw") {
          if (state === GenStateSuspendedStart) {
            state = GenStateCompleted;
            throw context.arg;
          }

          context.dispatchException(context.arg);

        } else if (context.method === "return") {
          context.abrupt("return", context.arg);
        }

        state = GenStateExecuting;

        var record = tryCatch(innerFn, self, context);
        if (record.type === "normal") {
          // If an exception is thrown from innerFn, we leave state ===
          // GenStateExecuting and loop back for another invocation.
          state = context.done
            ? GenStateCompleted
            : GenStateSuspendedYield;

          if (record.arg === ContinueSentinel) {
            continue;
          }

          return {
            value: record.arg,
            done: context.done
          };

        } else if (record.type === "throw") {
          state = GenStateCompleted;
          // Dispatch the exception by looping back around to the
          // context.dispatchException(context.arg) call above.
          context.method = "throw";
          context.arg = record.arg;
        }
      }
    };
  }

  // Call delegate.iterator[context.method](context.arg) and handle the
  // result, either by returning a { value, done } result from the
  // delegate iterator, or by modifying context.method and context.arg,
  // setting context.delegate to null, and returning the ContinueSentinel.
  function maybeInvokeDelegate(delegate, context) {
    var method = delegate.iterator[context.method];
    if (method === undefined) {
      // A .throw or .return when the delegate iterator has no .throw
      // method always terminates the yield* loop.
      context.delegate = null;

      if (context.method === "throw") {
        // Note: ["return"] must be used for ES3 parsing compatibility.
        if (delegate.iterator["return"]) {
          // If the delegate iterator has a return method, give it a
          // chance to clean up.
          context.method = "return";
          context.arg = undefined;
          maybeInvokeDelegate(delegate, context);

          if (context.method === "throw") {
            // If maybeInvokeDelegate(context) changed context.method from
            // "return" to "throw", let that override the TypeError below.
            return ContinueSentinel;
          }
        }

        context.method = "throw";
        context.arg = new TypeError(
          "The iterator does not provide a 'throw' method");
      }

      return ContinueSentinel;
    }

    var record = tryCatch(method, delegate.iterator, context.arg);

    if (record.type === "throw") {
      context.method = "throw";
      context.arg = record.arg;
      context.delegate = null;
      return ContinueSentinel;
    }

    var info = record.arg;

    if (! info) {
      context.method = "throw";
      context.arg = new TypeError("iterator result is not an object");
      context.delegate = null;
      return ContinueSentinel;
    }

    if (info.done) {
      // Assign the result of the finished delegate to the temporary
      // variable specified by delegate.resultName (see delegateYield).
      context[delegate.resultName] = info.value;

      // Resume execution at the desired location (see delegateYield).
      context.next = delegate.nextLoc;

      // If context.method was "throw" but the delegate handled the
      // exception, let the outer generator proceed normally. If
      // context.method was "next", forget context.arg since it has been
      // "consumed" by the delegate iterator. If context.method was
      // "return", allow the original .return call to continue in the
      // outer generator.
      if (context.method !== "return") {
        context.method = "next";
        context.arg = undefined;
      }

    } else {
      // Re-yield the result returned by the delegate method.
      return info;
    }

    // The delegate iterator is finished, so forget it and continue with
    // the outer generator.
    context.delegate = null;
    return ContinueSentinel;
  }

  // Define Generator.prototype.{next,throw,return} in terms of the
  // unified ._invoke helper method.
  defineIteratorMethods(Gp);

  Gp[toStringTagSymbol] = "Generator";

  // A Generator should always return itself as the iterator object when the
  // @@iterator function is called on it. Some browsers' implementations of the
  // iterator prototype chain incorrectly implement this, causing the Generator
  // object to not be returned from this call. This ensures that doesn't happen.
  // See https://github.com/facebook/regenerator/issues/274 for more details.
  Gp[iteratorSymbol] = function() {
    return this;
  };

  Gp.toString = function() {
    return "[object Generator]";
  };

  function pushTryEntry(locs) {
    var entry = { tryLoc: locs[0] };

    if (1 in locs) {
      entry.catchLoc = locs[1];
    }

    if (2 in locs) {
      entry.finallyLoc = locs[2];
      entry.afterLoc = locs[3];
    }

    this.tryEntries.push(entry);
  }

  function resetTryEntry(entry) {
    var record = entry.completion || {};
    record.type = "normal";
    delete record.arg;
    entry.completion = record;
  }

  function Context(tryLocsList) {
    // The root entry object (effectively a try statement without a catch
    // or a finally block) gives us a place to store values thrown from
    // locations where there is no enclosing try statement.
    this.tryEntries = [{ tryLoc: "root" }];
    tryLocsList.forEach(pushTryEntry, this);
    this.reset(true);
  }

  exports.keys = function(object) {
    var keys = [];
    for (var key in object) {
      keys.push(key);
    }
    keys.reverse();

    // Rather than returning an object with a next method, we keep
    // things simple and return the next function itself.
    return function next() {
      while (keys.length) {
        var key = keys.pop();
        if (key in object) {
          next.value = key;
          next.done = false;
          return next;
        }
      }

      // To avoid creating an additional object, we just hang the .value
      // and .done properties off the next function object itself. This
      // also ensures that the minifier will not anonymize the function.
      next.done = true;
      return next;
    };
  };

  function values(iterable) {
    if (iterable) {
      var iteratorMethod = iterable[iteratorSymbol];
      if (iteratorMethod) {
        return iteratorMethod.call(iterable);
      }

      if (typeof iterable.next === "function") {
        return iterable;
      }

      if (!isNaN(iterable.length)) {
        var i = -1, next = function next() {
          while (++i < iterable.length) {
            if (hasOwn.call(iterable, i)) {
              next.value = iterable[i];
              next.done = false;
              return next;
            }
          }

          next.value = undefined;
          next.done = true;

          return next;
        };

        return next.next = next;
      }
    }

    // Return an iterator with no values.
    return { next: doneResult };
  }
  exports.values = values;

  function doneResult() {
    return { value: undefined, done: true };
  }

  Context.prototype = {
    constructor: Context,

    reset: function(skipTempReset) {
      this.prev = 0;
      this.next = 0;
      // Resetting context._sent for legacy support of Babel's
      // function.sent implementation.
      this.sent = this._sent = undefined;
      this.done = false;
      this.delegate = null;

      this.method = "next";
      this.arg = undefined;

      this.tryEntries.forEach(resetTryEntry);

      if (!skipTempReset) {
        for (var name in this) {
          // Not sure about the optimal order of these conditions:
          if (name.charAt(0) === "t" &&
              hasOwn.call(this, name) &&
              !isNaN(+name.slice(1))) {
            this[name] = undefined;
          }
        }
      }
    },

    stop: function() {
      this.done = true;

      var rootEntry = this.tryEntries[0];
      var rootRecord = rootEntry.completion;
      if (rootRecord.type === "throw") {
        throw rootRecord.arg;
      }

      return this.rval;
    },

    dispatchException: function(exception) {
      if (this.done) {
        throw exception;
      }

      var context = this;
      function handle(loc, caught) {
        record.type = "throw";
        record.arg = exception;
        context.next = loc;

        if (caught) {
          // If the dispatched exception was caught by a catch block,
          // then let that catch block handle the exception normally.
          context.method = "next";
          context.arg = undefined;
        }

        return !! caught;
      }

      for (var i = this.tryEntries.length - 1; i >= 0; --i) {
        var entry = this.tryEntries[i];
        var record = entry.completion;

        if (entry.tryLoc === "root") {
          // Exception thrown outside of any try block that could handle
          // it, so set the completion value of the entire function to
          // throw the exception.
          return handle("end");
        }

        if (entry.tryLoc <= this.prev) {
          var hasCatch = hasOwn.call(entry, "catchLoc");
          var hasFinally = hasOwn.call(entry, "finallyLoc");

          if (hasCatch && hasFinally) {
            if (this.prev < entry.catchLoc) {
              return handle(entry.catchLoc, true);
            } else if (this.prev < entry.finallyLoc) {
              return handle(entry.finallyLoc);
            }

          } else if (hasCatch) {
            if (this.prev < entry.catchLoc) {
              return handle(entry.catchLoc, true);
            }

          } else if (hasFinally) {
            if (this.prev < entry.finallyLoc) {
              return handle(entry.finallyLoc);
            }

          } else {
            throw new Error("try statement without catch or finally");
          }
        }
      }
    },

    abrupt: function(type, arg) {
      for (var i = this.tryEntries.length - 1; i >= 0; --i) {
        var entry = this.tryEntries[i];
        if (entry.tryLoc <= this.prev &&
            hasOwn.call(entry, "finallyLoc") &&
            this.prev < entry.finallyLoc) {
          var finallyEntry = entry;
          break;
        }
      }

      if (finallyEntry &&
          (type === "break" ||
           type === "continue") &&
          finallyEntry.tryLoc <= arg &&
          arg <= finallyEntry.finallyLoc) {
        // Ignore the finally entry if control is not jumping to a
        // location outside the try/catch block.
        finallyEntry = null;
      }

      var record = finallyEntry ? finallyEntry.completion : {};
      record.type = type;
      record.arg = arg;

      if (finallyEntry) {
        this.method = "next";
        this.next = finallyEntry.finallyLoc;
        return ContinueSentinel;
      }

      return this.complete(record);
    },

    complete: function(record, afterLoc) {
      if (record.type === "throw") {
        throw record.arg;
      }

      if (record.type === "break" ||
          record.type === "continue") {
        this.next = record.arg;
      } else if (record.type === "return") {
        this.rval = this.arg = record.arg;
        this.method = "return";
        this.next = "end";
      } else if (record.type === "normal" && afterLoc) {
        this.next = afterLoc;
      }

      return ContinueSentinel;
    },

    finish: function(finallyLoc) {
      for (var i = this.tryEntries.length - 1; i >= 0; --i) {
        var entry = this.tryEntries[i];
        if (entry.finallyLoc === finallyLoc) {
          this.complete(entry.completion, entry.afterLoc);
          resetTryEntry(entry);
          return ContinueSentinel;
        }
      }
    },

    "catch": function(tryLoc) {
      for (var i = this.tryEntries.length - 1; i >= 0; --i) {
        var entry = this.tryEntries[i];
        if (entry.tryLoc === tryLoc) {
          var record = entry.completion;
          if (record.type === "throw") {
            var thrown = record.arg;
            resetTryEntry(entry);
          }
          return thrown;
        }
      }

      // The context.catch method must only be called with a location
      // argument that corresponds to a known catch block.
      throw new Error("illegal catch attempt");
    },

    delegateYield: function(iterable, resultName, nextLoc) {
      this.delegate = {
        iterator: values(iterable),
        resultName: resultName,
        nextLoc: nextLoc
      };

      if (this.method === "next") {
        // Deliberately forget the last sent value so that we don't
        // accidentally pass it on to the delegate.
        this.arg = undefined;
      }

      return ContinueSentinel;
    }
  };

  // Regardless of whether this script is executing as a CommonJS module
  // or not, return the runtime object so that we can declare the variable
  // regeneratorRuntime in the outer scope, which allows this module to be
  // injected easily by `bin/regenerator --include-runtime script.js`.
  return exports;

}(
  // If this script is executing as a CommonJS module, use module.exports
  // as the regeneratorRuntime namespace. Otherwise create a new empty
  // object. Either way, the resulting object will be used to initialize
  // the regeneratorRuntime variable at the top of this file.
   true ? module.exports : undefined
));

try {
  regeneratorRuntime = runtime;
} catch (accidentalStrictMode) {
  // This module should not be running in strict mode, so the above
  // assignment should always work unless something is misconfigured. Just
  // in case runtime.js accidentally runs in strict mode, we can escape
  // strict mode using a global Function call. This could conceivably fail
  // if a Content Security Policy forbids using Function, but in that case
  // the proper solution is to fix the accidental strict mode problem. If
  // you've misconfigured your bundler to force strict mode and applied a
  // CSP to forbid Function, and you're not willing to fix either of those
  // problems, please detail your unique predicament in a GitHub issue.
  Function("r", "regeneratorRuntime = r")(runtime);
}


/***/ }),

/***/ "./resources/assets/js/main/twilio.js":
/*!********************************************!*\
  !*** ./resources/assets/js/main/twilio.js ***!
  \********************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);


function _defineProperty(obj, key, value) {
  if (key in obj) {
    Object.defineProperty(obj, key, {
      value: value,
      enumerable: true,
      configurable: true,
      writable: true
    });
  } else {
    obj[key] = value;
  }

  return obj;
}

function _slicedToArray(arr, i) {
  return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _nonIterableRest();
}

function _nonIterableRest() {
  throw new TypeError("Invalid attempt to destructure non-iterable instance");
}

function _iterableToArrayLimit(arr, i) {
  if (!(Symbol.iterator in Object(arr) || Object.prototype.toString.call(arr) === "[object Arguments]")) {
    return;
  }

  var _arr = [];
  var _n = true;
  var _d = false;
  var _e = undefined;

  try {
    for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) {
      _arr.push(_s.value);

      if (i && _arr.length === i) break;
    }
  } catch (err) {
    _d = true;
    _e = err;
  } finally {
    try {
      if (!_n && _i["return"] != null) _i["return"]();
    } finally {
      if (_d) throw _e;
    }
  }

  return _arr;
}

function _arrayWithHoles(arr) {
  if (Array.isArray(arr)) return arr;
}

function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) {
  try {
    var info = gen[key](arg);
    var value = info.value;
  } catch (error) {
    reject(error);
    return;
  }

  if (info.done) {
    resolve(value);
  } else {
    Promise.resolve(value).then(_next, _throw);
  }
}

function _asyncToGenerator(fn) {
  return function () {
    var self = this,
        args = arguments;
    return new Promise(function (resolve, reject) {
      var gen = fn.apply(self, args);

      function _next(value) {
        asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value);
      }

      function _throw(err) {
        asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err);
      }

      _next(undefined);
    });
  };
}

var AudioContext = window.AudioContext || window.webkitAudioContext;
var audioContext = AudioContext ? new AudioContext() : null;
var $modals = $("#modals");
var $selectMicModal = $("#select-mic", $modals);
var $selectCameraModal = $("#select-camera", $modals);
var $showErrorModal = $("#show-error", $modals);
var localTracks = {
  audio: null,
  video: null
};
var connectOptions = {
  // Available only in Small Group or Group Rooms only. Please set "Room Type"
  // to "Group" or "Small Group" in your Twilio Console:
  // https://www.twilio.com/console/video/configure
  bandwidthProfile: {
    video: {
      dominantSpeakerPriority: "high",
      mode: "collaboration",
      renderDimensions: {
        high: {
          height: 720,
          width: 1280
        },
        standard: {
          height: 90,
          width: 160
        }
      }
    }
  },
  // Available only in Small Group or Group Rooms only. Please set "Room Type"
  // to "Group" or "Small Group" in your Twilio Console:
  // https://www.twilio.com/console/video/configure
  // dominantSpeaker: true,
  // Comment this line to disable verbose logging.
  logLevel: "debug",
  // Comment this line if you are playing music.
  maxAudioBitrate: 16000,
  // VP8 simulcast enables the media server in a Small Group or Group Room
  // to adapt your encoded video quality for each RemoteParticipant based on
  // their individual bandwidth constraints. This has no utility if you are
  // using Peer-to-Peer Rooms, so you can comment this line.
  preferredVideoCodecs: [{
    codec: "VP8",
    simulcast: true
  }],
  // Capture 720p video @ 24 fps.
  video: {}
};
var deviceIds = {
  audio: localStorage.getItem("audioDeviceId"),
  video: localStorage.getItem("videoDeviceId")
};
var $leave = $("#leave-room");
var $room = $("#room");
var $activeParticipant = $("div#active-participant > div.participant.main", $room);
var $activeVideo = $("video", $activeParticipant);
var $participants = $("div#participants", $room);
var activeParticipant = null;
var isActiveParticipantPinned = false;

window.selectCamera =
/*#__PURE__*/
function () {
  var _ref = _asyncToGenerator(
  /*#__PURE__*/
  _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee(accessToken, roomName) {
    return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
      while (1) {
        switch (_context.prev = _context.next) {
          case 0:
            _context.next = 2;
            return selectMedia("video", $selectCameraModal, function (stream) {
              var $video = $("video", $selectCameraModal);
              $video.get(0).srcObject = stream;
            });

          case 2:
            deviceIds.video = _context.sent;
            connectOptions.name = roomName;
            connectOptions.video.deviceId = {
              exact: deviceIds.video
            };
            return _context.abrupt("return", selectMicrophone(accessToken));

          case 6:
          case "end":
            return _context.stop();
        }
      }
    }, _callee);
  }));

  return function (_x, _x2) {
    return _ref.apply(this, arguments);
  };
}();

function selectMicrophone(_x3) {
  return _selectMicrophone.apply(this, arguments);
}

function _selectMicrophone() {
  _selectMicrophone = _asyncToGenerator(
  /*#__PURE__*/
  _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2(accessToken) {
    return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
      while (1) {
        switch (_context2.prev = _context2.next) {
          case 0:
            _context2.next = 2;
            return selectMedia("audio", $selectMicModal, function (stream) {
              var $levelIndicator = $("svg rect", $selectMicModal);
              var maxLevel = Number($levelIndicator.attr("height"));
              micLevel(stream, maxLevel, function (level) {
                return $levelIndicator.attr("y", maxLevel - level);
              });
            });

          case 2:
            deviceIds.audio = _context2.sent;
            connectOptions.audio = {
              deviceId: {
                exact: deviceIds.audio
              }
            };
            return _context2.abrupt("return", joinRoom(accessToken, connectOptions));

          case 5:
          case "end":
            return _context2.stop();
        }
      }
    }, _callee2);
  }));
  return _selectMicrophone.apply(this, arguments);
}

function joinRoom(_x4, _x5) {
  return _joinRoom.apply(this, arguments);
}
/**
 * Set the active Participant's video.
 * @param participant - the active Participant
 */


function _joinRoom() {
  _joinRoom = _asyncToGenerator(
  /*#__PURE__*/
  _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee3(token, connectOptions) {
    var role, room, localVideoTrack;
    return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee3$(_context3) {
      while (1) {
        switch (_context3.prev = _context3.next) {
          case 0:
            role = $('#role').val(); // Join to the Room with the given AccessToken and ConnectOptions.

            _context3.next = 3;
            return twilioVideo.connect(token, connectOptions);

          case 3:
            room = _context3.sent; // Save the LocalVideoTrack.

            localVideoTrack = Array.from(room.localParticipant.videoTracks.values())[0].track; // Make the Room available in the JavaScript console for debugging.

            window.room = room; // Handle the LocalParticipant's media.

            participantConnected(room.localParticipant, room); // Subscribe to the media published by RemoteParticipants already in the Room.

            room.participants.forEach(function (participant) {
              participantConnected(participant, room);
            }); // Subscribe to the media published by RemoteParticipants joining the Room later.

            room.on("participantConnected", function (participant) {
              participantConnected(participant, room);
            }); // Handle a disconnected RemoteParticipant.

            room.on("participantDisconnected", function (participant) {
              participantDisconnected(participant, room);
            }); // Set the current active Participant.

            setCurrentActiveParticipant(room); // Update the active Participant when changed, only if the user has not
            // pinned any particular Participant as the active Participant.
            // room.on("dominantSpeakerChanged", () => {
            //     if (!isActiveParticipantPinned) {
            //         setCurrentActiveParticipant(room);
            //     }
            // });
            // Leave the Room when the "Leave Room" button is clicked.

            $leave.click(function onLeave() {
              $leave.off("click", onLeave);
              room.disconnect();
            });
            return _context3.abrupt("return", new Promise(function (resolve, reject) {
              // Leave the Room when the "beforeunload" event is fired.
              window.onbeforeunload = function () {
                room.disconnect();
              };

              room.once("disconnected", function (room, error) {
                // Clear the event handlers on document and window..
                window.onbeforeunload = null; // Stop the LocalVideoTrack.

                localVideoTrack.stop(); // Handle the disconnected LocalParticipant.

                participantDisconnected(room.localParticipant, room); // Handle the disconnected RemoteParticipants.

                room.participants.forEach(function (participant) {
                  participantDisconnected(participant, room);
                }); // Clear the active Participant's video.

                $activeVideo.get(0).srcObject = null; // Clear the Room reference used for debugging from the JavaScript console.

                window.room = null;

                if (error) {
                  // Reject the Promise with the TwilioError so that the Room selection
                  // modal (plus the TwilioError message) can be displayed.
                  reject(error);
                } else {
                  // Resolve the Promise so that the Room selection modal can be
                  // displayed.
                  resolve();
                }
              });
            }));

          case 13:
          case "end":
            return _context3.stop();
        }
      }
    }, _callee3);
  }));
  return _joinRoom.apply(this, arguments);
}

function setActiveParticipant(participant) {
  if (activeParticipant) {
    var _$activeParticipant = $("div#".concat(activeParticipant.sid), $participants);

    _$activeParticipant.removeClass("active");

    _$activeParticipant.removeClass("pinned"); // Detach any existing VideoTrack of the active Participant.


    var _ref2 = Array.from(activeParticipant.videoTracks.values())[0] || {},
        activeTrack = _ref2.track;

    if (activeTrack) {
      activeTrack.detach($activeVideo.get(0));
      $activeVideo.css("opacity", "0");
    }
  } // Set the new active Participant.


  activeParticipant = participant;
  var identity = participant.identity,
      sid = participant.sid;
  var $participant = $("div#".concat(sid), $participants);
  $participant.addClass("active");

  if (isActiveParticipantPinned) {
    $participant.addClass("pinned");
  } // Attach the new active Participant's video.


  var _ref3 = Array.from(participant.videoTracks.values())[0] || {},
      track = _ref3.track;

  if (track) {
    track.attach($activeVideo.get(0));
    $activeVideo.css("opacity", "");
  } // Set the new active Participant's identity


  $activeParticipant.attr("data-identity", identity);
}
/**
 * Set the current active Participant in the Room.
 * @param room - the Room which contains the current active Participant
 */


function setCurrentActiveParticipant(room) {
  var dominantSpeaker = room.dominantSpeaker,
      localParticipant = room.localParticipant;
  setActiveParticipant(dominantSpeaker || localParticipant);
}
/**
 * Set up the Participant's media container.
 * @param participant - the Participant whose media container is to be set up
 * @param room - the Room that the Participant joined
 */


function setupParticipantContainer(participant, room) {
  var identity = participant.identity,
      sid = participant.sid; // Add a container for the Participant's media.

  var $container = $("<div class=\"participant\" data-identity=\"".concat(identity, "\" id=\"").concat(sid, "\">\n      <audio autoplay ").concat(participant === room.localParticipant ? "muted" : "", " style=\"opacity: 0\"></audio>\n      <video autoplay muted playsinline style=\"opacity: 0\"></video>\n    </div>")); // Toggle the pinning of the active Participant's video.

  $container.on("click", function () {
    if (activeParticipant === participant && isActiveParticipantPinned) {
      // Unpin the RemoteParticipant and update the current active Participant.
      setVideoPriority(participant, null);
      isActiveParticipantPinned = false;
      setCurrentActiveParticipant(room);
    } else {
      // Pin the RemoteParticipant as the active Participant.
      if (isActiveParticipantPinned) {
        setVideoPriority(activeParticipant, null);
      }

      setVideoPriority(participant, "high");
      isActiveParticipantPinned = true;
      setActiveParticipant(participant);
    }
  }); // Add the Participant's container to the DOM.

  $participants.append($container);
}
/**
 * Set the VideoTrack priority for the given RemoteParticipant. This has no
 * effect in Peer-to-Peer Rooms.
 * @param participant - the RemoteParticipant whose VideoTrack priority is to be set
 * @param priority - null | 'low' | 'standard' | 'high'
 */


function setVideoPriority(participant, priority) {
  participant.videoTracks.forEach(function (publication) {
    var track = publication.track;

    if (track && track.setPriority) {
      track.setPriority(priority);
    }
  });
}
/**
 * Attach a Track to the DOM.
 * @param track - the Track to attach
 * @param participant - the Participant which published the Track
 */


function attachTrack(track, participant) {
  // Attach the Participant's Track to the thumbnail.
  var $media = $("div#".concat(participant.sid, " > ").concat(track.kind), $participants);
  $media.css("opacity", "");
  track.attach($media.get(0)); // If the attached Track is a VideoTrack that is published by the active
  // Participant, then attach it to the main video as well.

  if (track.kind === "video" && participant === activeParticipant) {
    track.attach($activeVideo.get(0));
    $activeVideo.css("opacity", "");
  }
}
/**
 * Detach a Track from the DOM.
 * @param track - the Track to be detached
 * @param participant - the Participant that is publishing the Track
 */


function detachTrack(track, participant) {
  // Detach the Participant's Track from the thumbnail.
  var $media = $("div#".concat(participant.sid, " > ").concat(track.kind), $participants);
  $media.css("opacity", "0");
  track.detach($media.get(0)); // If the detached Track is a VideoTrack that is published by the active
  // Participant, then detach it from the main video as well.

  if (track.kind === "video" && participant === activeParticipant) {
    track.detach($activeVideo.get(0));
    $activeVideo.css("opacity", "0");
  }
}
/**
 * Handle the Participant's media.
 * @param participant - the Participant
 * @param room - the Room that the Participant joined
 */


function participantConnected(participant, room) {
  // Set up the Participant's media container.
  setupParticipantContainer(participant, room); // Handle the TrackPublications already published by the Participant.

  participant.tracks.forEach(function (publication) {
    trackPublished(publication, participant);
  }); // Handle theTrackPublications that will be published by the Participant later.

  participant.on("trackPublished", function (publication) {
    trackPublished(publication, participant);
  });
}
/**
 * Handle a disconnected Participant.
 * @param participant - the disconnected Participant
 * @param room - the Room that the Participant disconnected from
 */


function participantDisconnected(participant, room) {
  // If the disconnected Participant was pinned as the active Participant, then
  // unpin it so that the active Participant can be updated.
  if (activeParticipant === participant && isActiveParticipantPinned) {
    isActiveParticipantPinned = false;
    setCurrentActiveParticipant(room);
  } // Remove the Participant's media container.


  $("div#".concat(participant.sid), $participants).remove();
}
/**
 * Handle to the TrackPublication's media.
 * @param publication - the TrackPublication
 * @param participant - the publishing Participant
 */


function trackPublished(publication, participant) {
  // If the TrackPublication is already subscribed to, then attach the Track to the DOM.
  if (publication.track) {
    attachTrack(publication.track, participant);
  } // Once the TrackPublication is subscribed to, attach the Track to the DOM.


  publication.on("subscribed", function (track) {
    attachTrack(track, participant);
  }); // Once the TrackPublication is unsubscribed from, detach the Track from the DOM.

  publication.on("unsubscribed", function (track) {
    detachTrack(track, participant);
  });
}

function micLevel(stream, maxLevel, onLevel) {
  audioContext.resume().then(function () {
    var analyser = audioContext.createAnalyser();
    analyser.fftSize = 1024;
    analyser.smoothingTimeConstant = 0.5;
    var source = audioContext.createMediaStreamSource(stream);
    source.connect(analyser);
    var samples = new Uint8Array(analyser.frequencyBinCount);
    var track = stream.getTracks()[0];
    var level = null;
    requestAnimationFrame(function checkLevel() {
      analyser.getByteFrequencyData(samples);
      var rms = rootMeanSquare(samples);
      var log2Rms = rms && Math.log2(rms);
      var newLevel = Math.ceil(maxLevel * log2Rms / 8);

      if (level !== newLevel) {
        level = newLevel;
        onLevel(level);
      }

      requestAnimationFrame(track.readyState === "ended" ? function () {
        return onLevel(0);
      } : checkLevel);
    });
  });
}

function rootMeanSquare(samples) {
  var sumSq = samples.reduce(function (sumSq, sample) {
    return sumSq + sample * sample;
  }, 0);
  return Math.sqrt(sumSq / samples.length);
}

function applyInputDevice(_x6, _x7, _x8) {
  return _applyInputDevice.apply(this, arguments);
}

function _applyInputDevice() {
  _applyInputDevice = _asyncToGenerator(
  /*#__PURE__*/
  _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee4(kind, deviceId, render) {
    var _ref4, _ref5, track;

    return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee4$(_context4) {
      while (1) {
        switch (_context4.prev = _context4.next) {
          case 0:
            _context4.next = 2;
            return twilioVideo.createLocalTracks(_defineProperty({}, kind, {
              deviceId: deviceId
            }));

          case 2:
            _ref4 = _context4.sent;
            _ref5 = _slicedToArray(_ref4, 1);
            track = _ref5[0]; // Stop the previous LocalTrack, if present.

            if (localTracks[kind]) {
              localTracks[kind].stop();
            } // Render the current LocalTrack.


            localTracks[kind] = track;
            render(new MediaStream([track.mediaStreamTrack]));

          case 8:
          case "end":
            return _context4.stop();
        }
      }
    }, _callee4);
  }));
  return _applyInputDevice.apply(this, arguments);
}

function getInputDevices(_x9) {
  return _getInputDevices.apply(this, arguments);
}

function _getInputDevices() {
  _getInputDevices = _asyncToGenerator(
  /*#__PURE__*/
  _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee5(kind) {
    var devices;
    return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee5$(_context5) {
      while (1) {
        switch (_context5.prev = _context5.next) {
          case 0:
            _context5.next = 2;
            return navigator.mediaDevices.enumerateDevices();

          case 2:
            devices = _context5.sent;
            return _context5.abrupt("return", devices.filter(function (device) {
              return device.kind === "".concat(kind, "input");
            }));

          case 4:
          case "end":
            return _context5.stop();
        }
      }
    }, _callee5);
  }));
  return _getInputDevices.apply(this, arguments);
}

function selectMedia(_x10, _x11, _x12) {
  return _selectMedia.apply(this, arguments);
}

function _selectMedia() {
  _selectMedia = _asyncToGenerator(
  /*#__PURE__*/
  _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee6(kind, $modal, render) {
    var $apply, $inputDevices, setDevice, devices;
    return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee6$(_context6) {
      while (1) {
        switch (_context6.prev = _context6.next) {
          case 0:
            $apply = $("button", $modal);
            $inputDevices = $("select", $modal);

            setDevice = function setDevice() {
              return applyInputDevice(kind, $inputDevices.val(), render);
            }; // Get the list of available media input devices.


            _context6.next = 5;
            return getInputDevices(kind);

          case 5:
            devices = _context6.sent;
            _context6.next = 8;
            return applyInputDevice(kind, devices[0].deviceId, render);

          case 8:
            if (!devices.every(function (_ref6) {
              var deviceId = _ref6.deviceId,
                  label = _ref6.label;
              return !deviceId || !label;
            })) {
              _context6.next = 12;
              break;
            }

            _context6.next = 11;
            return getInputDevices(kind);

          case 11:
            devices = _context6.sent;

          case 12:
            // Populate the modal with the list of available media input devices.
            $inputDevices.html(devices.map(function (_ref7) {
              var deviceId = _ref7.deviceId,
                  label = _ref7.label;
              return "<option value=\"".concat(deviceId, "\">").concat(label, "</option>");
            }));
            return _context6.abrupt("return", new Promise(function (resolve) {
              $modal.on("shown.bs.modal", function onShow() {
                $modal.off("shown.bs.modal", onShow); // When the user selects a different media input device, apply it.

                $inputDevices.change(setDevice); // When the user clicks the "Apply" button, close the modal.

                $apply.click(function onApply() {
                  $inputDevices.off("change", setDevice);
                  $apply.off("click", onApply);
                  $modal.modal("hide");
                });
              }); // When the modal is closed, save the device ID.

              $modal.on("hidden.bs.modal", function onHide() {
                $modal.off("hidden.bs.modal", onHide); // Stop the LocalTrack, if present.

                if (localTracks[kind]) {
                  localTracks[kind].stop();
                  localTracks[kind] = null;
                } // Resolve the Promise with the saved device ID.


                var deviceId = $inputDevices.val();
                localStorage.setItem("".concat(kind, "DeviceId"), deviceId);
                resolve(deviceId);
              }); // Show the modal.

              $modal.modal({
                backdrop: "static",
                focus: true,
                keyboard: false,
                show: true
              });
            }));

          case 14:
          case "end":
            return _context6.stop();
        }
      }
    }, _callee6);
  }));
  return _selectMedia.apply(this, arguments);
}

function showError($modal, error) {
  // Add the appropriate error message to the alert.
  $("div.alert", $modal).html(getUserFriendlyError(error));
  $modal.modal({
    backdrop: "static",
    focus: true,
    keyboard: false,
    show: true
  });
}

/***/ }),

/***/ 2:
/*!**************************************************!*\
  !*** multi ./resources/assets/js/main/twilio.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/rana/Desktop/Rana/Personal/Projects/career24h/resources/assets/js/main/twilio.js */"./resources/assets/js/main/twilio.js");


/***/ })

/******/ });